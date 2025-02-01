<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('menuId')->nullable()->comment('Padre|Patern');
            $table->string('link')->nullable()->comment('Ruta|Route');
            $table->enum('status', ['disabled', 'clickable'])->nullable()->comment('Estado:Deshabilitado,Clickeable|Route:Disabled,Clickable');
            $table->enum('type', ['route', 'anchor'])->nullable()->comment('Tipo:Ruta,Ancla|Type:Route,Anchor');
            $table->boolean('active')->nullable()->default(1)->comment('¿Activo?|Active?');
            $table->timestamps();
        });
        Schema::create('menu_i18n', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('menuId')->nullable()->comment('Padre|Patern');
            $table->string('name')->nullable()->comment('Nombre|Name');
            $table->string('lang')->nullable()->comment('Idioma|Language');
        });

        Schema::create('forms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable()->comment('Nombre|Name');
            $table->string('email')->nullable()->comment('Email|Email');
            $table->string('phone')->nullable()->comment('Teléfono|Phone');
            $table->string('description')->nullable()->comment('Descripción|Description');
            $table->timestamps();
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('color')->nullable()->comment('Color|Color');
            $table->boolean('active')->nullable()->default(1)->comment('¿Activo?|Active?');
            $table->timestamps();
        });
        Schema::create('tag_i18n', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('tagId')->nullable()->comment('Tag|Tag');
            $table->string('name')->nullable()->comment('Nombre|Name');
            $table->string('lang')->nullable()->comment('Idioma|Language');
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('active')->nullable()->default(1)->comment('¿Activo?|Active?');
            $table->timestamps();
        });
        Schema::create('category_i18n', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable()->comment('Nombre|Name');
            $table->timestamps();
        });

        Schema::create('news', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('categoryId')->nullable()->comment('Noticia|New');
            $table->string('date')->nullable()->comment('Fecha de publicación|Date of publication');
            $table->string('image')->nullable()->comment('Imagen|Image');
            $table->string('email')->nullable()->comment('Email|Email');
            $table->string('phone')->nullable()->comment('Teléfono|Phone');
            $table->boolean('active')->nullable()->default(1)->comment('¿Activo?|Active?');
            $table->timestamps();
        });
        Schema::create('new_i18n', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('newId')->nullable()->comment('Noticia|New');
            $table->string('title')->nullable()->comment('Título|Title');
            $table->text('description')->nullable()->comment('Descripción|Description');
            $table->string('lang')->nullable()->comment('Idioma|Language');
        });
        Schema::create('new_images', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('image')->nullable()->comment('Imagen|Image');
        });
        Schema::create('new_tags', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('newId')->nullable()->comment('Noticia|Notice');
            $table->string('tagId')->nullable()->comment('Tag|Tag');
            $table->timestamps();
        });
        Schema::create('new_comments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('newId')->nullable()->comment('Noticia|Notice');
            $table->string('name')->nullable()->comment('Nombre|Name');
            $table->text('description')->nullable()->comment('Descripción|Description');
            $table->timestamps();
        });
        /** TODO: TRADUCIR */
        Schema::create('days', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('count')->nullable()->comment('Número|Number');
            $table->boolean('active')->nullable()->default(1)->comment('¿Activo?|Active?');
            $table->timestamps();
        });
        Schema::create('day_i18n', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title')->nullable()->comment('Título|Title');
        });
        Schema::create('day_services', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->double('price', 15, 2)->nullable()->comment('Nombre|Name');
            $table->string('image')->nullable()->comment('Nombre|Name');
            $table->boolean('active')->nullable()->default(1)->comment('¿Activo?|Active?');
            $table->timestamps();
        });
        Schema::create('day_service_i18n', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title')->nullable()->comment('Nombre|Name');
            $table->text('description')->nullable()->comment('Nombre|Name');
            $table->string('lang')->nullable()->comment('Número|Number');
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('phone')->nullable()->comment('Número|Number');
            $table->string('email')->nullable()->comment('Número|Number');
            $table->string('address')->nullable()->comment('Número|Number');
            $table->string('map')->nullable()->comment('Número|Number');
            $table->timestamps();
        });

        Schema::create('abouts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('active')->nullable()->default(1)->comment('¿Activo?|Active?');
            $table->timestamps();
        });
        Schema::create('about_i18n', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title')->nullable()->comment('Número|Number');
            $table->text('description')->nullable()->comment('Número|Number');
            $table->string('lang')->nullable()->comment('Número|Number');
            $table->timestamps();
        });
        Schema::create('about_images', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('image')->nullable()->comment('Número|Number');
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('image')->nullable()->comment('Número|Number');
            $table->boolean('active')->nullable()->default(1)->comment('¿Activo?|Active?');
            $table->timestamps();
        });
        Schema::create('review_i18n', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable()->comment('Número|Number');
            $table->text('description')->nullable()->comment('Número|Number');
            $table->string('lang')->nullable()->comment('Número|Number');
            $table->timestamps();
        });

        Schema::create('paremeters', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('active')->nullable()->default(1)->comment('¿Activo?|Active?');
            $table->timestamps();
        });
        Schema::create('parameter_i18n', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('key')->nullable()->comment('Número|Number');
            $table->string('value')->nullable()->comment('Número|Number');
            $table->string('lang')->nullable()->comment('Número|Number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
