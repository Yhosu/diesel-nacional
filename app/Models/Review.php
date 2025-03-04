<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Review extends Model {
    use HasFactory;
	protected $table  = 'reviews';
    protected $es = 'Reseña';
	protected $en = 'Review';
	public $timestamps = true;
	public $incrementing = false;
	protected $fillable = [
        'name',
		'detail',
		'qualification',
		'image',
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