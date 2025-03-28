<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Parameter extends Model {
    use HasFactory, HasTranslations;
    public $translatable = ['key', 'value'];
    protected $es = 'Parámetros Globales';
	protected $en = 'Global parameters';
	protected $table  = 'parameters';
	public $timestamps = true;
    public $incrementing = false;
    protected $fillable = [
		'code',
        'key',
        'value'
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
        'key' => 'required',
        'value' => 'required'
	);
		
		/* Updating rules */
    public static $rules_edit = array(
        "id"=>"required",
    );

    public static $rules_delete = array(
        "id"=>"required",
    );    	    
}