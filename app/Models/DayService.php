<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DayService extends Model {
    use HasFactory;
	protected $table  = 'day_services';
	public $timestamps = true;
}