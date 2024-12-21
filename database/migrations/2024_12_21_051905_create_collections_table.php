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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama Lukisan
            $table->string('nama_pelukis'); // Pelukis
            $table->year('year')->nullable(); // Tahun Dibuat
            $table->text('description')->nullable(); // Deskripsi Lukisan
            $table->enum('tipe_lukisan', ['Realisme', 'Abstrak', 'Sejarah', 'Mural'])->default('Realisme');
          //  $table->date('acquisition_date')->nullable(); // Status Lukisan (dropdown)
            $table->enum('status', ['Ditampilkan', 'Disimpan', 'Lelang'])->default('Ditampilkan');
            $table->enum('condition', ['Baik', 'Cacat'])->default('Baik');
            //$table->string('location')->nullable(); // Lokasi penyimpanan
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};
