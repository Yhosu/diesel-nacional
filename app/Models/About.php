<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class About extends Model {
    use HasFactory, HasTranslations;
	protected $table  = 'abouts';
	protected $es = 'Acerca de';
	protected $en = 'About';
	public $translatable = ['title', 'description'];
	public $timestamps = true;
	protected $fillable = [
		'number',
		'title',
		'description',
		'image_1',
		'image_2'
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