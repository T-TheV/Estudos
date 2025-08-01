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
        Schema::create('pacientes', function (Blueprint $table) {
        $table->id(); // Equivalente a INT AUTO_INCREMENT PRIMARY KEY
        $table->string('nome', 100);
        $table->string('cpf', 14)->unique();
        $table->date('data_nascimento');
        $table->string('telefone', 20)->nullable(); // ->nullable() torna a coluna opcional
        $table->timestamps(); // Cria as colunas created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
