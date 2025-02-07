<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TagI18n extends Model {
    use HasFactory;
	protected $table  = 'tag_i18n';
	public $timestamps = false;
}