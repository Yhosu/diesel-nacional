<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DayI18n extends Model {
    use HasFactory;
	protected $table  = 'day_i18n';
	public $timestamps = false;
}