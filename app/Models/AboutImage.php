<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AboutImage extends Model {
    use HasFactory;
	protected $table  = 'about_images';
	public $timestamps = true;
}