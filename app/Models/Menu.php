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
        'active'
    ];

    public static function boot() {
        parent::boot();   
        static::creating(function ($model) {
            $model->id = \Str::uuid();
        });
    }

    public function menu_items() {
        return $this->hasMany(MenuItem::class, 'menuId', 'id')->where('active', 1)->orderBy('order', 'ASC')->limit(4);
    }

    public function getLang( $lang ) {
        return $this->$lang;
    }
}