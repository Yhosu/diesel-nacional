<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Form extends Model {
    use HasFactory;
	protected $table  = 'forms';
	protected $es = 'Formulario de contacto';
	protected $en = 'Contacto Form';
	public $timestamps = true;
	public $incrementing = false;
	public $casts = ['id'=>'string'];

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
        'email' => 'required',
        'phone' => 'required',
        'subject' => 'required',
        'comments' => 'required',
	);
		
		/* Updating rules */
    public static $rules_edit = array(
        "id"=>"required",
    );

    public static $rules_delete = array(
        "id"=>"required",
    );    
}