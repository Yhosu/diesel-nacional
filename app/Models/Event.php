<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Event extends Model {
    use HasFactory, HasTranslations;
    public $translatable = ['title', 'subtitle', 'detail'];
    protected $es = 'Evento';
	protected $en = 'Event';
	protected $table  = 'events';
	public $timestamps = true;
    public $incrementing = false;
    protected $fillable = [
        'order',
        'title',
        'subtitle',
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