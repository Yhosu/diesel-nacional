<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Category extends Model {
    use HasFactory, HasTranslations;
	public $translatable = ['name', 'detail'];
	protected $es = 'Categoría';
	protected $en = 'Category';
	protected $table  = 'categories';
	public $timestamps = true;
	public $incrementing = false;
	protected $casts = ['id'=>'string'];
	protected $fillable = [
		'code',
		'name',
		'active'
	];

	public static function boot() {
        parent::boot();   
        static::creating(function ($model) {
            $model->id = \Str::uuid();
        });
    }

	public function menus() {
		return $this->hasMany(Menu::class, 'categoryId', 'id')->where('active', 1)->orderBy('order', 'ASC');
		// return $this->hasMany(Menu::class, 'categoryId', 'id')->where('active', 1)->orderBy('order', 'ASC')->limit(7);
	}

	public function all_menus() {
		return $this->hasMany(Menu::class, 'categoryId', 'id')->where('active', 1)->orderBy('order', 'ASC');
	}

	public function getLang( $lang ) {
        return $this->$lang;
    }

	public static $rules_create = array(
        'order' => 'required',
		'name' => 'required',
		'detail' => 'required',
		'active' => 'required'
	);
		
		/* Updating rules */
    public static $rules_edit = array(
        "id"=>"required",
    );

    public static $rules_delete = array(
        "id"=>"required",
    );

	public function menu_items() {
		return $this->hasManyThrough(
            MenuItem::class,
            Menu::class,
            'categoryId', 
            'menuId',
            'id',
            'id'
        )->whereNotNull('menu_items.image');
	}

	public function limit_menu_items() {
		return $this->hasManyThrough(
            MenuItem::class,
            Menu::class,
            'categoryId', 
            'menuId',
            'id',
            'id'
        )->whereNotNull('menu_items.image')->limit(5);
	}
}