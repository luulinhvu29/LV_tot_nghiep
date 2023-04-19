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
        Schema::create('authority', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->nullable();

            $table->boolean('pro')->default(false)->comment('quyen truy cap san pham');
            $table->boolean('user')->default(false)->comment('quyen truy cap user');
            $table->boolean('enter')->default(false)->comment('quyen truy cap phieu nhap');
            $table->boolean('order')->default(false)->comment('quyen truy cap don hang');
            $table->boolean('brand')->default(false)->comment('quyen truy cap thuong hieu');
            $table->boolean('cate')->default(false)->comment('quyen truy cap san danh muc');


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
        Schema::dropIfExists('authority');
    }
};
