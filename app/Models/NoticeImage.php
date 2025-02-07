<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NoticeImage extends Model {
    use HasFactory;
	protected $table  = 'notice_images';
	public $timestamps = true;
}