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
            $table->foreignId('brand_id')->nullable()->constrained('brands');
            $table->string('product_name',150);
            $table->string('slug',150);
            $table->string('product_code',50)->nullable();
            $table->string('color',50);
            $table->string('size',30);
            $table->string('qty');
            $table->decimal('pur_price',8,2);
            $table->decimal('sale_price',8,2);
            $table->decimal('promo_price',8,2)->nullable();
            $table->decimal('discount',8,2)->nullable();
            $table->decimal('e_money',8,2)->nullable();
            $table->string('position')->nullable();
            $table->decimal('indoor_charge',8,2)->nullable();
            $table->decimal('outdoor_charge',8,2)->nullable();
            $table->text('description')->nullable();
            $table->decimal('total_price',8,2)->nullable();
            $table->boolean('status')->default(1);
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
