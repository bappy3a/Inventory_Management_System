<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description')->nullable();      
            $table->string('buy_price')->nullable()->default(0);      
            $table->string('sell_price')->nullable()->default(0);      
            $table->string('quantity')->nullable()->default(0);      
            $table->string('unit');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('supplier_id')->nullable();
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
        Schema::dropIfExists('products');
    }
}
