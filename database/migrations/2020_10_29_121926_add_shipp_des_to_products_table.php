<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShippDesToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('shipp_des',150)->nullable()->change();
            $table->renameColumn('size_show','flash_timing')->nullable();
            $table->boolean('flash_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('shipp_des');
            $table->dropColumn('flash_timing');
            $table->dropColumn('flash_status');
        });
    }
}
