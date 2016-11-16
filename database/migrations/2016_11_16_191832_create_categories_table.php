<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');          //ID da categoria.

            $table->string('thumbnail_url');        //URL da imagem da categoria.
            $table->integer('parentCategoryId');    //ID da categoria pai.
            $table->boolean('isFinal');             //Flag que identifica se a categoria é final.
            $table->string('name');                 //Nome da categoria.
            $table->json('json_links');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
