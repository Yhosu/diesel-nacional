<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Menu extends Model {
    use HasFactory, HasTranslations;
    public $translatable = ['title', 'detail'];
    protected $es = 'Menú';
	protected $en = 'Menu';
	protected $table  = 'menus';
	public $timestamps = true;
    public $incrementing = false;
    protected $fillable = [
        'categoryId',
        'order',
        'title',
        'detail',
        'active',
        'image'
    ];

    public static function boot() {
        parent::boot();   
        static::creating(function ($model) {
            $model->id = \Str::uuid();
        });
    }

    public function menu_items() {
        return $this->hasMany(MenuItem::class, 'menuId', 'id')->where('active', 1)->orderBy('order', 'ASC');
        // return $this->hasMany(MenuItem::class, 'menuId', 'id')->where('active', 1)->orderBy('order', 'ASC')->limit(4);
    }

    public function all_menu_items() {
        return $this->hasMany(MenuItem::class, 'menuId', 'id')->where('active', 1)->orderBy('order', 'ASC');
    }

    public function getLang( $lang ) {
        return $this->$lang;
    }

    public static $rules_create = array(
        'categoryId' => 'required',
        'order' => 'required',
        'title' => 'required',
        'detail' => 'required',
        'active' => 'required',
	);
		
		/* Updating rules */
    public static $rules_edit = array(
        "id"=>"required",
    );

    public static $rules_delete = array(
        "id"=>"required",
    );

    public function category() {
        return $this->hasOne(Category::class, 'id', 'categoryId');
    }
}