<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_member', function (Blueprint $table) {
            $table->increments('id_member');
            $table->string('kd_member', 6)->unique();
            $table->string('nm_member', 100);
            $table->string('alamat', 100);
            $table->string('kota', 50);
            $table->string('telp', 15)->unique();
            $table->integer('jk');
            $table->string('foto',50);
            $table->integer('status');           
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
        Schema::dropIfExists('tb_member');
    }
}
