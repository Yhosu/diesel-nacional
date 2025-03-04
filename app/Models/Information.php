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
}