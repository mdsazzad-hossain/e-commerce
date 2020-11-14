<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banars', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('slug');
            $table->string('product_name')->nullable();
            $table->string('category_name')->nullable();
            $table->string('price')->nullable();
            $table->string('promo_price')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('banars');
    }
}
