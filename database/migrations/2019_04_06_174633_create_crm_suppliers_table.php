<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrmSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('supplier_name')->nullable();
            $table->string('phone_no1');      
            $table->string('phone_no2')->nullable();      
            $table->string('email')->nullable();      
            $table->string('address')->nullable();      
            $table->string('city')->nullable();    
            $table->string('postal_code')->nullable();    
            $table->string('country')->nullable(); 
            $table->unsignedInteger('user_id');   
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
        Schema::dropIfExists('crm_suppliers');
    }
}
