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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->nullable();
            $table->string('name');
            $table->double('price')->nullable();
            $table->bigInteger('stock')->nullable();
            $table->string('description', 255)->nullable();
            $table->string('picture', 255);
            $table->bigInteger('state')->nullable();
            $table->unsignedbigInteger('categories_id')->nullable();
            $table->foreign('categories_id')
                    ->references('id')->on('categories')
                    ->onDelete('set null');
            $table->unsignedbigInteger('discounts_id');
            $table->foreign('discounts_id')
                    ->references('id')->on('discounts');                    
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
};
