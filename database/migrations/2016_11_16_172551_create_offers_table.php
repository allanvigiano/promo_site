<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('offer_id'); //original was only 'id'

            $table->string('offerName');
            $table->json('links');
            $table->string('thumbnail_url');
            $table->string('priceValue');
            $table->string('priceFromValue');
            $table->string('discountPercentage');

            $table->string('categoryId');
            $table->string('productId');

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
        Schema::dropIfExists('offers');
    }
}
