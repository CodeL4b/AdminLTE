<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_banks', function (Blueprint $table) {
            $table->bigIncrements('id');

            
            $table->string('acc_name');
            $table->string('acc_num');
            $table->string('name');
            $table->string('branch');
            $table->string('swift_code');

            $table->string('branch_add');
            $table->string('bin_num');
            $table->string('currency');

            
            $table->string('email');
            $table->string('phone_no');
            $table->string('rm_name');
            $table->string('rm_mobile_num');

            
            
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
        Schema::dropIfExists('seller_banks');
    }
}
