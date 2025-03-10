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
        Schema::create('image_folders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('extension', ['jpg','png','gif'])->default('jpg');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('image_sizes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->default(1);
            $table->string('code');
            $table->enum('type', ['original','resize','fit'])->default('original');
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->foreign('parent_id')->references('id')->on('image_folders')->onDelete('cascade');
        });
        // Diesel Tables
        Schema::create('forms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable()->comment('Nombre|Name');
            $table->string('email')->nullable()->comment('Email|Email');
            $table->string('phone')->nullable()->comment('Teléfono|Phone');
            $table->enum('subject', ['any', 'upcoming-events', 'book-table', 'banquet', 'other'])->nullable()->default('any')->comment('Motivo|Subject');
            $table->text('comments')->nullable()->comment('Comentarios|Comments');
            $table->timestamps();
        });
        /** TODO: TRADUCIR */
        Schema::create('schedules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('order')->nullable()->comment('Orden|Order');
            $table->text('title')->nullable()->comment('Título|Title');
            $table->string('from')->nullable()->comment('Desde|From');
            $table->string('to')->nullable()->comment('Hasta|To');
            $table->boolean('active')->nullable()->default(1)->comment('¿Activo?|Active?');
            $table->timestamps();
        });
        Schema::create('abouts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('number')->nullable()->comment('Número|Number');
            $table->text('title')->nullable()->comment('Título|Title');
            $table->text('description')->nullable()->comment('Descripción|Description');
            $table->string('image_1')->nullable()->comment('Imagen Frontal|Frontal image');
            $table->string('image_2')->nullable()->comment('Imagen trasera|Back image');
            $table->boolean('active')->nullable()->default(1)->comment('¿Activo?|Active?');
            $table->timestamps();
        });
        Schema::create('informations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->comment('Informaciones|Informations');
            $table->string('code')->nullable()->comment('Código|Code');
            $table->text('title')->nullable()->comment('Título|Title');
            $table->text('subtitle')->nullable()->comment('Subtítulo|Subtitle');
            $table->string('image')->nullable()->comment('Imagen|Image');
            $table->timestamps();
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('order')->nullable()->comment('Orden|Order');
            $table->text('name')->nullable()->comment('Nombre|Name');
            $table->string('code')->nullable()->comment('Código|Code');
            $table->text('detail')->nullable()->comment('Detalle|Detail');
            $table->boolean('active')->nullable()->default(1)->comment('¿Activo?|Active?');
            $table->timestamps();
        });
        Schema::create('menus', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('categoryId')->nullable()->comment('Categoría|Category');
            $table->integer('order')->nullable()->comment('Orden|Order');
            $table->text('title')->nullable()->comment('Nombre|Name');
            $table->text('detail')->nullable()->comment('Descripción|Description');
            $table->string('image')->nullable()->comment('Imagen|Image');
            $table->boolean('active')->nullable()->default(1)->comment('¿Activo?|Active?');
            $table->timestamps();
        });
        Schema::create('menu_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('menuId')->nullable()->comment('Menú|Menu');
            $table->integer('order')->nullable()->comment('Orden|Order');
            $table->text('title')->nullable()->comment('Nombre|Name');
            $table->text('detail')->nullable()->comment('Descripción|Description');
            $table->string('image')->nullable()->comment('Imagen|Image');
            $table->double('price', 18, 2)->nullable()->default('0')->comment('Precio|Price');
            $table->boolean('active')->nullable()->default(1)->comment('¿Activo?|Active?');
            $table->timestamps();
        });
        Schema::create('characteristics', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('order')->nullable()->comment('Orden|Order');
            $table->text('title')->nullable()->comment('Título|Title');
            $table->text('subtitle')->nullable()->comment('Subtítulo|Subtitle');
            $table->string('icon')->nullable()->comment('Font Awesome Ícono|Font Awesome Icon');
            $table->text('detail')->nullable()->comment('Detalle|Detail');
            $table->string('image')->nullable()->comment('Imagen|Image');
            $table->boolean('active')->nullable()->default(1)->comment('¿Activo?|Active?');
            $table->timestamps();
        });
        Schema::create('events', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('order')->nullable()->comment('Orden|Order');
            $table->text('title')->nullable()->comment('Título|Title');
            $table->text('subtitle')->nullable()->comment('Subtítulo|Subtitle');
            $table->text('detail')->nullable()->comment('Detalle|Detail');
            $table->boolean('showBanner')->nullable()->default(0)->comment('Mostrar Banner|Show Banner');
            $table->string('image')->nullable()->comment('Imagen|Image');
            $table->boolean('active')->nullable()->default(1)->comment('¿Activo?|Active?');
            $table->timestamps();
        });
        Schema::create('reviews', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable()->comment('Nombre|Name');
            $table->text('detail')->nullable()->comment('Comentario|Comment');
            $table->integer('qualification')->nullable()->comment('Calificación|Qualification');
            $table->string('image')->nullable()->comment('Imagen|Image');
            $table->timestamps();
        });
        Schema::create('parameters', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code')->nullable()->comment('Código|Code');
            $table->text('key')->nullable()->comment('Clave|Key');
            $table->text('value')->nullable()->comment('Valor|Value');
            $table->timestamps();
        });
        Schema::create('social_networks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable()->comment('Nombre|Name');
            $table->string('icon')->nullable()->comment('Font Awesome Ícono|Font Awesome Icon');
            $table->string('url')->nullable()->comment('Link de la red social|Social network Link');
            $table->boolean('active')->nullable()->default(1)->comment('¿Activo?|Active?');
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
