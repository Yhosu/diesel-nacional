<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Review extends Model {
    use HasFactory;
	protected $table  = 'reviews';
	public $timestamps = true;
}