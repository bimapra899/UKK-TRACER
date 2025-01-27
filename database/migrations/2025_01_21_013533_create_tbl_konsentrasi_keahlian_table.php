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
        Schema::create('tbl_konsentrasi_keahlian', function (Blueprint $table) {
            $table->id('id_konsentrasi_keahlian');
            $table->foreignId('id_program_keahlian')->constrained('tbl_program_keahlian', 'id_program_keahlian')->onDelete('cascade');
            $table->string('kode_konsentrasi_keahlian', 10)->unique();
            $table->string('konsentrasi_keahlian', 100);
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
        Schema::dropIfExists('tbl_konsentrasi_keahlian');
    }
};
