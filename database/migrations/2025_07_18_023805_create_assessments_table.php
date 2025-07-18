<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penerima_id')->constrained('penerima_bantuans')->onDelete('cascade');
            $table->string('penghasilan');
            $table->string('kondisi_rumah');
            $table->string('hasil_akhir'); // 'layak' atau 'tidak layak'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('assessments');
    }

};
