<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Menu extends Model {
    use HasFactory;
	protected $table  = 'menus';
	public $timestamps = true;
}