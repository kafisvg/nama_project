<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('penerima_bantuans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->text('alamat');
            $table->string('jenis_bantuan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penerima_bantuans');
    }
};
