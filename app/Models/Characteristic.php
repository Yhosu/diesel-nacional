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
	public $casts = ['id'=>'string'];
	public $timestamps = true;
	public $incrementing = false;
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

	public static $rules_create = array(
        'order' => 'required',
		'title' => 'required',
		'subtitle' => 'required',
		'detail' => 'required',
		'image' => 'required',
		'active' => 'required',
	);
		
		/* Updating rules */
    public static $rules_edit = array(
        "id"=>"required",
    );

    public static $rules_delete = array(
        "id"=>"required",
    );    	
}