<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('single_vendor_id')->nullable()->constrained('single_vendors');
            $table->foreignId('vendor_id')->nullable()->constrained('vendors');
            $table->string('product_name',150);
            $table->string('slug',150);
            $table->string('product_code',50)->nullable();
            $table->string('color',50);
            $table->string('size',30);
            $table->string('qty');
            $table->decimal('pur_price',8,2);
            $table->decimal('sale_price',8,2);
            $table->decimal('promo_price',8,2)->default(0.00);
            $table->decimal('discount',8,2)->default(0.00);
            $table->decimal('admin_percent',8,2)->default(0.00);
            $table->string('position')->nullable();
            $table->string('deli_destinination')->default('free shipping');
            $table->decimal('deli_charge',8,2)->default('0');
            $table->text('description')->nullable();
            $table->decimal('total_price',8,2)->default(0.00);
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
        Schema::dropIfExists('vendor_products');
    }
}
