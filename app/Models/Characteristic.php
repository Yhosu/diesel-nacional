<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Characteristic extends Model {
    use HasFactory, HasTranslations;
	protected $table  = 'characteristics';
	public $translatable = ['title', 'subtitle', 'detail'];
	protected $es = 'Características';
	protected $en = 'Characteristics';
	public $timestamps = true;
	protected $fillable = [
		'order',
		'title',
		'detail',
		'subtitle',
		'image'
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