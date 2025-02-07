<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DayServiceI18n extends Model {
    use HasFactory;
	protected $table  = 'day_service_i18n';
	public $timestamps = false;
}