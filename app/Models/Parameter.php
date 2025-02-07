<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Parameter extends Model {
    use HasFactory;
	protected $table  = 'parameters';
	public $timestamps = false;
}