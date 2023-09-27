<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->float('price')->default(0);
            $table->string('image')->nullable();
            $table->integer('code')->nullable();
            $table->string('reference')->nullable();
            $table->integer('stock_balance')->nullable();
            $table->unsignedBigInteger('user_id')->comment('Created By User');
            $table->unsignedBigInteger('categories_id');
            $table->timestamps();
        });

        Schema::table('products', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('categories_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
