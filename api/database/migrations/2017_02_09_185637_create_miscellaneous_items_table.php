<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiscellaneousItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdr_miscellaneous_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_number');
            $table->string('item');
            $table->string('description');
            $table->string('uom');
            $table->integer('quantity');
            $table->string('vendor');
            $table->string('category');
            $table->integer('material_cost');
            $table->integer('labor_cost');
            $table->integer('retail_price');
            $table->integer('company_id');
            $table->string('approved_by');
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
        Schema::drop('rdr_miscellaneous_items');
    }
}
