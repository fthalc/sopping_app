<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SiparisDetay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siparis_detays', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('urun_id');
            $table->integer('urun_adet');
            $table->timestamps();
            $table->foreign('urun_id')
                ->references('urun_id')
                ->on('sepets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siparis_detays');
    }
}
