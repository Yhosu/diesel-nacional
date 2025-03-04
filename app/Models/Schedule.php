<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Schedule extends Model {
    use HasFactory, HasTranslations;
	protected $table  = 'schedules';
	protected $es = 'Horario';
	protected $en = 'Schedule';
	public $translatable = ['title'];
	public $timestamps = true;
	protected $fillable = [
		'title',
		'from',
		'to',
        'order'
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