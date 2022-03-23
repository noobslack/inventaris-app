<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_ruangan')->constrained('ruangans');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('merk_type');
            $table->string('bahan');
            $table->string('asalusul');
            $table->year('tahun_perolehan');
            $table->string('ukuran');
            $table->string('satuan');
            $table->enum('kondisi', ['Baik','Rusak Ringan','Rusak Berat']);
            $table->string('jumlah');
            $table->string('harga');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('inventaris');
    }
}
