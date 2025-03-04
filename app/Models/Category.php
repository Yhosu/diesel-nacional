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
		// return $this->hasMany(Menu::class, 'categoryId', 'id')->where('active', 1)->orderBy('order', 'ASC')->limit(5);
		return $this->hasMany(Menu::class, 'categoryId', 'id')->where('active', 1)->limit(5);
	}

	public function getLang( $lang ) {
        return $this->$lang;
    }
}