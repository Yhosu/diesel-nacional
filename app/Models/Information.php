<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Information extends Model {
    use HasFactory, HasTranslations;
    public $translatable = ['title', 'subtitle'];
    protected $en = 'Information';
    protected $es = 'Información';
	protected $table  = 'informations';
    public $casts = ['id'=>'string'];
    public $incrementing = false;
    protected $fillable = [
        'title',
        'subtitle'
    ];
	public $timestamps = true;

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
        'code' => 'required',
        'title' => 'required',
        'subtitle' => 'required',
        'image' => 'required',
	);
		
		/* Updating rules */
    public static $rules_edit = array(
        "id"=>"required",
    );

    public static $rules_delete = array(
        "id"=>"required",
    );		    
}