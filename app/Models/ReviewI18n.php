<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ReviewI18n extends Model {
    use HasFactory;
	protected $table  = 'review_i18n';
	public $timestamps = false;
}