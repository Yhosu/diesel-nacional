<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class MenuItem extends Model {
    use HasFactory, HasTranslations;
    public $translatable = ['title', 'detail'];
    protected $es = 'Items del Menú';
	protected $en = 'Menu Items';
	protected $table  = 'menu_items';
	public $timestamps = true;
    public $incrementing = false;
    protected $fillable = [
        'menuId',
        'order',
        'title',
        'detail',
        'active'
    ];

    public static function boot() {
        parent::boot();   
        static::creating(function ($model) {
            $model->id = \Str::uuid();
        });
    }

    public function getLang( $lang ) {
        return $this->$lang;
    }

    public static $rules_create = array(
        'menuId' => 'required',
        'order' => 'required',
        'title' => 'required',
        'detail' => 'required',
        'image' => 'required',
        'price' => 'required',
        'active' => 'required',
	);
		
		/* Updating rules */
    public static $rules_edit = array(
        "id"=>"required",
    );

    public static $rules_delete = array(
        "id"=>"required",
    );    

    public function menu() {
        return $this->hasOne(Menu::class, 'id', 'menuId');
    }
}