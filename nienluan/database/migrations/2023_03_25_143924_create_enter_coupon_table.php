<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enter_coupon', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->nullable();
            $table->integer('product_id')->nullable();

            $table->double('enter_price');
            $table->integer('enter_qty');


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
        Schema::dropIfExists('enter_coupon');
    }
};
