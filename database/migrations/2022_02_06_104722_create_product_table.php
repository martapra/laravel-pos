<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_product', function (Blueprint $table) {
            $table->increments('id_product')->nullable(false);
            $table->string('kd_product',6)->unique();
            $table->string('nm_product',100);
            $table->integer('harga');
            $table->enum('kategori',['Desktop','Laptop','Game Hardware','Monitor','Computer Accessories']);
            $table->string('satuan',10);
            $table->enum('stok',['Available','Not Available']);
            $table->text('ket')->nullable(true);
            $table->longText('foto')->nullable(true);
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
        Schema::dropIfExists('tb_product');
    }
}
