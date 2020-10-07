<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('child_category_id');
            $table->unsignedBigInteger('sub_child_category_id');
            $table->string('brand_name',100);
            $table->text('br_description',)->nullable();
            $table->boolean('status')->default(1);
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('child_category_id')->references('id')->on('child_categories');
            $table->foreign('sub_child_category_id')->references('id')->on('sub_child_categories');
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
    }
}
