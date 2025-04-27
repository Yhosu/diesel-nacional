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
        return \DB::getSchemaBuilder()->getColumnType($table_name, $field) ?? 'extra';
    }

    public static function getColumns( $table_name, $lang ) {
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
                    when LOCATE('double', `column_type`) > 0 then 'double'
                    else `column_type`
                end as type,
                SUBSTRING_INDEX(`column_comment`, '|', '$langCode')  as comment,
                CASE when LOCATE('{$enum}', `column_type`) > 0 then REPLACE( REPLACE( REPLACE(`column_type`, 'enum(', ''), ')', '' ), '\'', '' ) else '{}' end as options
            from 
                `information_schema`.`COLUMNS`
            where 
                `table_name` = '$table_name' and `column_name` not in ('created_at', 'updated_at', 'id') and `table_schema` = '$database'
            "
        );
        foreach( $result as $item ) {
            if( $item->options == '{}' && substr($item->name, -2) != 'Id' ) {
                $item->options = [];
                continue;
            }
            $item->options = substr($item->name, -2) == 'Id'
                ? \Func::getOptionsRelation( $item->name, $table_name )
                : \Func::getEnumOptions( $item->options );
        }
        return $result;
    }

    public static function getOptionsRelation( $column, $table ) {
        $class = "App\Models\\" . ucfirst( str_replace('Id', '', $column) );
        $elements = $class::get();
        $arrayOptions = [];
        foreach( $elements as $element ) {
            $key = config('nodes.' . $table . '.'. $column . '.key');
            $arrayOptions[] = [ 'key' => $element->id, 'value' => $element->$key];
        }
        return $arrayOptions;
    }

    public static function getEnumOptions( $options ) {
        $options = explode(',', $options);
        $arrayOptions = [];
        foreach( $options as $option ) $arrayOptions[] = [ 'key' => $option, 'value' => __('diesel.subjects.' . $option)];
        return $arrayOptions;
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
                    when LOCATE('double', `column_type`) > 0 then 'double'
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
                    when LOCATE('double', `column_type`) > 0 then 'double'
                    else `column_type`
                end as type,
                SUBSTRING_INDEX(`column_comment`, '|', '$langCode')  as comment,
                CASE when LOCATE('{$enum}', `column_type`) > 0 then REPLACE( REPLACE( REPLACE(`column_type`, 'enum(', ''), ')', '' ), '\'', '' ) else '{}' end as options
            from 
                `information_schema`.`COLUMNS`
            where 
                `table_name` = '$table_name' 
                    and 
                `column_name` not in ('created_at', 'updated_at', 'id') 
                    and 
                `table_schema` = '$database' 
                    and 
                LOCATE('detail', `column_name`) = 0 
                    and 
                LOCATE('description', `column_name`) = 0
                    and 
                LOCATE('image', `column_name`) = 0
                    and 
                LOCATE('int(', `column_type`) = 0
                    and 
                LOCATE('double', `column_type`) = 0
            "
        );
        $result[] = (object)[
            'name'    => 'created_at_from',
            'type'    => 'date',
            'comment' => __('diesel.created_at_from'),
            'options' => '{}',
        ];
        $result[] = (object)[
            'name'    => 'created_at_to',
            'type'    => 'date',
            'comment' => __('diesel.created_at_to'),
            'options' => '{}',
        ];
        foreach( $result as $item ) {
            if( $item->options == '{}' && substr($item->name, -2) != 'Id' ) {
                $item->options = [];
                continue;
            }
            $item->options = substr($item->name, -2) == 'Id'
                ? \Func::getOptionsRelation( $item->name, $table_name )
                : \Func::getEnumOptions( $item->options );
        }
        if( method_exists('App\Helpers\Func', 'extra_filters_' . $table_name ) ) {
            $fn = 'extra_filters_' . $table_name;
            \Func::$fn( $result );
        }
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

    public static function validateImageUrl( $value, $folder, $file, $image ) {
        return $value != 'null' && !empty( $value ) && ( \Asset::get_image_path($folder, 'mini', $image) != \Asset::get_image_path($folder, 'mini', $file) );
    }

    public static function renderMenuHtml($items, $isFirstLevel = true) {
        if ($isFirstLevel) {
            echo '<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">';
        } else {
            echo '<ul class="menu-content">';
        }

        foreach ($items as $item) {
            echo '<li class="' . ($isFirstLevel ? 'nav-item ' : '') . (request()->is($item['url']) || request()->segment(3) == $item['node'] ? 'active' : '') . '">';
            echo '<a class="d-flex align-items-center" href="' . (url($item['url'])). '">';
            echo '<i data-feather="hexagon"></i>';
            echo '<span class="menu-title text-truncate" data-i18n="' . (isset($item['label']) ? $item['label'] : 'Opción de menú') . '">' . (isset($item['label']) ? $item['label'] : 'Opción de menú') . '</span>';
            echo '</a>';
            if (isset($item['submenu']) && is_array($item['submenu']) && count($item['submenu']) > 0) {
                self::renderMenuHtml($item['submenu'], false);
            }
            echo '</li>';
        }

        echo '</ul>';
    }

    public static function getNameRelation( $fields, $column, $key ) {
        $elemCollect  = collect( $fields );
        $elemRelation = (array)$elemCollect->firstWhere('name', $column) ?? [];
        $item         = collect( $elemRelation['options'] )->firstWhere('key', $key);
        return $item['value'];
    }

    public static function extra_filters_menu_items( &$result ) {
        $result[] = (object)[
            'name'    => 'xt_with_image',
            'type'    => 'select',
            'comment' => __('diesel.with_image'),
            'options' => [
                [
                    'key' => 0,
                    'value' => 'No',
                ],
                [
                    'key' => 1,
                    'value' => 'Si',
                ]
            ],
        ];
    }    
}