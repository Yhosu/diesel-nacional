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

class Func {

    public static function getModel( $node ) {
        $className = 'App\\Models\\' . \Str::studly(\Str::singular($node));
        return $className;
    }

    public static function getTypeField( $table_name, $field ) {
        return \DB::getSchemaBuilder()->getColumnType($table_name, $field);
    }

    public static function getColumns( $table_name, $lang ) {
        $arraySubtLang = [ 'es' => 1, 'en' => -1 ];
        $database = config('database.connections.mysql.database');
        $langCode = $arraySubtLang[$lang];
        $enum = 'enum(';
        return \DB::select("
            select 
                `column_name` as name, 
                CASE
                    when RIGHT(`column_name`,2) = 'Id' then 'select'
                    when LOCATE('detail', `column_name`) > 0 then 'textarea'
                    when LOCATE('{$enum}', `column_type`) >  0 then 'select'
                    when LOCATE('description', `column_name`) > 0 then 'froala'
                    when LOCATE('image', `column_name`) > 0 then 'image'
                    when LOCATE('varchar(', `column_type`) > 0 then 'text'
                    when LOCATE('tinyint(', `column_type`) > 0 then 'boolean'
                    when LOCATE('int(', `column_type`) > 0 then 'integer'
                    else `column_type`
                end as type,
                SUBSTRING_INDEX(`column_comment`, '|', '$langCode')  as comment,
                CASE when LOCATE('{$enum}', `column_type`) > 0 then REPLACE( REPLACE( REPLACE(`column_type`, 'enum(', ''), ')', '' ), '\'', '' ) else '' end as options
            from 
                `information_schema`.`COLUMNS`
            where 
                `table_name` = '$table_name' and `column_name` not in ('created_at', 'updated_at', 'id') and `table_schema` = '$database'
            "
        );
    }

    public static function getColumnsWithTimestamps( $table_name, $lang ) {
        $arraySubtLang = [ 'es' => 1, 'en' => -1 ];
        $database = config('database.connections.mysql.database');
        $langCode = $arraySubtLang[$lang];
        $enum = 'enum(';
        return \DB::select("
            select 
                `column_name` as name, 
                CASE
                    when RIGHT(`column_name`,2) = 'Id' then 'select'
                    when LOCATE('detail', `column_name`) > 0 then 'textarea'
                    when LOCATE('{$enum}', `column_type`) >  0 then 'select'
                    when LOCATE('description', `column_name`) > 0 then 'froala'
                    when LOCATE('image', `column_name`) > 0 then 'image'
                    when LOCATE('varchar(', `column_type`) > 0 then 'text'
                    when LOCATE('tinyint(', `column_type`) > 0 then 'boolean'
                    when LOCATE('int(', `column_type`) > 0 then 'integer'
                    else `column_type`
                end as type,
                SUBSTRING_INDEX(`column_comment`, '|', '$langCode')  as comment,
                CASE when LOCATE('{$enum}', `column_type`) > 0 then REPLACE( REPLACE( REPLACE(`column_type`, 'enum(', ''), ')', '' ), '\'', '' ) else '' end as options
            from 
                `information_schema`.`COLUMNS`
            where 
                `table_name` = '$table_name' and `column_name` not in ('id') and `table_schema` = '$database'
            "
        );
    }    

    public static function getFilters( $table_name, $lang ) {
        $arraySubtLang = [ 'es' => 1, 'en' => -1 ];
        $database = config('database.connections.mysql.database');
        $langCode = $arraySubtLang[$lang];
        $enum = 'enum(';
        $result = \DB::select("
            select 
                `column_name` as name, 
                CASE
                    when RIGHT(`column_name`,2) = 'Id' then 'select'
                    when LOCATE('detail', `column_name`) > 0 then 'textarea'
                    when LOCATE('{$enum}', `column_type`) >  0 then 'select'
                    when LOCATE('description', `column_name`) > 0 then 'froala'
                    when LOCATE('image', `column_name`) > 0 then 'image'
                    when LOCATE('varchar(', `column_type`) > 0 then 'text'
                    when LOCATE('tinyint(', `column_type`) > 0 then 'boolean'
                    when LOCATE('int(', `column_type`) > 0 then 'integer'
                    else `column_type`
                end as type,
                SUBSTRING_INDEX(`column_comment`, '|', '$langCode')  as comment,
                CASE when LOCATE('{$enum}', `column_type`) > 0 then REPLACE( REPLACE( REPLACE(`column_type`, 'enum(', ''), ')', '' ), '\'', '' ) else '' end as options
            from 
                `information_schema`.`COLUMNS`
            where 
                `table_name` = '$table_name' and `column_name` not in ('created_at', 'updated_at', 'id') and `table_schema` = '$database'
            "
        );
        $result[] = (object)[
            'name'    => 'created_at_from',
            'type'    => 'date',
            'comment' => __('diesel.created_at_from'),
            'options' => '',
        ];
        $result[] = (object)[
            'name'    => 'created_at_to',
            'type'    => 'date',
            'comment' => __('diesel.created_at_to'),
            'options' => '',
        ];
        return $result;
    }

    public static function createItem( $class, $id ) {
        return [ 'process' => true, 'item' => null, 'message' => ''];
    }

    public static function editItem( $class, $id ) {
        $item = $class::find( $id );
        if( !$item ) return [ 'process' => false, 'message' => __('diesel.item_not_found')];
        return [ 'process' => true, 'item' => $item, 'message' => __('diesel.item_found')];
    }

    public static function readItem( $class, $id ) {
        $item = $class::find( $id );
        if( !$item ) return [ 'process' => false, 'message' => __('diesel.item_not_found')];
        return [ 'process' => true, 'item' => $item, 'message' => __('diesel.item_found')];
    }

    public static function deleteItem( $class, $id ) {
        $item = $class::find( $id );
        if( !$item ) return [ 'process' => false, 'message' => __('diesel.item_not_found')];
        $item->delete();
        return [ 'process' => true, 'item' => $item, 'message' => __('diesel.item_eliminated'), 'redirect' => true ];
    }
}