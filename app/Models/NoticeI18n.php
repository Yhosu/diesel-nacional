<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NoticeI18n extends Model {
    use HasFactory;
	protected $table  = 'notice_i18n';
	public $timestamps = false;
}