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
        Schema::create('tbl_testimoni', function (Blueprint $table) {
            $table->id('id_testimoni');
            $table->foreignId('id_alumni')->constrained('tbl_alumni','id_alumni')->onDelete('cascade');
            $table->longText('testimoni');
            $table->date('tgl_testimoni');
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
        Schema::dropIfExists('tbl_testimoni');
    }
};
