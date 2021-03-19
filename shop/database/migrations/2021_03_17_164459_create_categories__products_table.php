<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories__products', function (Blueprint $table) {
            $table->increments('id');
            //создание поля для связывания с таблицей 'catigories'
	        $table->integer('category_id')->unsigned()->default(0);
	        //создание внешнего ключа для поля 'Teacher_Id', который связан с полем id таблицы 'catigories'
	        $table->foreign('category_id')->references('id')->on('categories');
	        //создание поля для связывания с таблицей 'products'
	        $table->integer('product_id')->unsigned()->default(0);
	        //создание внешнего ключа для поля 'Teacher_Id', который связан с полем id таблицы 'products'
	        $table->foreign('product_id')->references('id')->on('products');
	        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories__products');
    }
}
