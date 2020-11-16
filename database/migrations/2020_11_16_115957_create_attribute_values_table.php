<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attribute_id')->nullable()->constrained('attributes');
            $table->string('value',100);
            $table->string('slug',100);
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('attribute_values');
    }
}
