<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->decimal('price',10,2)->nullable();
            $table->decimal('special_price',10,2)->nullable();
            $table->text('description')->nullable();
            $table->string('sku')->nullable();
            $table->string('slug')->nullable();
            $table->string('image_url')->nullable();
            
	        $table->integer('created_by')->nullable();
	        $table->integer('updated_by')->nullable();
	        $table->integer('deleted_by')->nullable();

            $table->timestamps();
	        $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('');
    }
}
