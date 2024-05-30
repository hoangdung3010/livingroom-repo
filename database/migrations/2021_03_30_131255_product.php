<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('product_name');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->float('product_price');
            $table->float('product_importprice');
            $table->float('product_price_sale');
            $table->string('khoiluong');
            $table->string('dairongcao');
            $table->string('docaoyen');
            $table->string('dungtichbinhxang');
            $table->string('phuoctruoc');
            $table->string('phuocsau');
            $table->string('dongco');
            $table->string('nguyenlieu');
            $table->string('dungtichxylanh');


            
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
        Schema::dropIfExists('product');
    }
}
