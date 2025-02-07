<?php

namespace App\Helpers;

use PDF;
use ZipArchive;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Carbon;

class CustomFunc {

    public static function before_migrate_actions() {
    }
    
    public static function after_migrate_actions() {
    }
}