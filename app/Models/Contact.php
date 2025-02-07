<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contact extends Model {
    use HasFactory;
	protected $table  = 'contacts';
	public $timestamps = true;
}