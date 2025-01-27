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
        Schema::create('tbl_tracer_kuliah', function (Blueprint $table) {
            $table->id('id_tracer_kuliah');
            $table->foreignId('id_alumni')->constrained('tbl_alumni','id_alumni')->onDelete('cascade');
            $table->string('tracer_kuliah_kampus', 45);
            $table->string('tracer_kuliah_status', 45);
            $table->string('tracer_kuliah_jenjang', 45);
            $table->string('tracer_kuliah_jurusan', 45);
            $table->string('tracer_kuliah_linier', 45);
            $table->string('tracer_kuliah_alamat', 45);
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
        Schema::dropIfExists('tbl_tracer_kuliah');
    }
};
