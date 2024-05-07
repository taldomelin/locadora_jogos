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
        Schema::create('Jogos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',120)->unique()->nullable(false);
            $table->decimal('preco',12,2)->nullable(false);
            $table->string('descricao',800)->nullable(false);
            $table->string('classificacao',120)->nullable(false);
            $table->string('plataformas',120)->nullable(false);
            $table->string('desenvolvedor',120)->nullable(false);
            $table->string('distribuidora',120)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Jogos');
    }
};
