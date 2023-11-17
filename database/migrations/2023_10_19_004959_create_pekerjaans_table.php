<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pekerjaans', function (Blueprint $table) {
            $table->id();
            $table->string('pekerjaan_id')->unique();
            $table->string('posisi');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->decimal('gaji', 10, 2);
            $table->date('tanggal_posting');
            $table->string('email_id')->constrained();
            $table->string('gambar');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaans');
    }
};
