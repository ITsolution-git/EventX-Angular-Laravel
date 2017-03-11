<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RmdProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('rmd_products', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id');
          $table->integer('order_num')->unsigned();
          $table->string('product_id');
          $table->integer('company_id')->unsigned();
          $table->text('attributes');
          $table->string('sku');
          $table->string('price');
          $table->timestamps();
      });

    //   Schema::table('rmd_products', function($table) {
    //     $table->foreign('order_num')->references('order_number')->on('rmd_ordernumber');
    // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rmd_products');
    }
}
