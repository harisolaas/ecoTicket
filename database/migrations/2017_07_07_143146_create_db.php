<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::create('buyers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('buyer_product', function (Blueprint $table) {
            $table->primary('buyer_id', 'product_id');
            $table->integer('buyer_id');
            $table->integer('product_id');
            // $table->integer('count');
            $table->timestamps();
        });

        Schema::create('buyer_seller', function (Blueprint $table) {
            $table->primary('buyer_id', 'seller_id');
            $table->integer('buyer_id');
            $table->integer('seller_id');
            // $table->integer('count');
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('categorie_product', function (Blueprint $table) {
            $table->primary('categorie_id', 'product_id');
            $table->integer('categorie_id');
            $table->integer('product_id');
            // $table->integer('count');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('barcode');
            $table->string('name');
            $table->string('short_desc')->nullable();
            $table->string('long_desc')->nullable();
            $table->float('price');
            $table->integer('brand_id');
            $table->timestamps();
        });

        Schema::create('product_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('src');
            $table->integer('product_id');
        });

        Schema::create('product_seller', function (Blueprint $table) {
            $table->primary('product_id', 'seller_id');
            $table->integer('product_id');
            $table->integer('seller_id');
            $table->timestamps();
        });

        Schema::create('product_transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('transaction_id');
        });

        Schema::create('sellers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->smallInteger('type')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buyer_id');
            $table->integer('seller_id');
            $table->float('total_amount');
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
        Schema::dropIfExists('brands');
        Schema::dropIfExists('buyers');
        Schema::dropIfExists('buyers_products');
        Schema::dropIfExists('buyers_sellers');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('categories_products');
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('products_sellers');
        Schema::dropIfExists('products_transactions');
        Schema::dropIfExists('sellers');
        Schema::dropIfExists('transactions');
    }
}
