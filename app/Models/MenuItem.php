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
}