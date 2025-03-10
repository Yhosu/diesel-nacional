<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class SocialNetwork extends Model {
    use HasFactory, HasTranslations;
    protected $es = 'Red Social';
	protected $en = 'Social Network';
	protected $table  = 'social_networks';
	public $timestamps = true;
    public $incrementing = false;
    protected $fillable = [
        'name',
        'icon',
        'url',
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

    public static $rules_create = array(
        'name' => 'required',
        'icon' => 'required',
        'url'  => 'required',
	);
		
		/* Updating rules */
    public static $rules_edit = array(
        "id"=>"required",
    );

    public static $rules_delete = array(
        "id"=>"required",
    );    	    
}