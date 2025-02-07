<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Notice extends Model {
    use HasFactory;
	protected $table  = 'notices';
	public $timestamps = true;
}