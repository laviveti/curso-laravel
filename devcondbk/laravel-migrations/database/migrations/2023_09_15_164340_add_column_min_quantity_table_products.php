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
        // Acessar a tabela "products", e nela criar uma coluna "min_quantity"
        Schema::table('products', function (Blueprint $table) {
            $table
                ->integer('min_quantity') // Nome da coluna
                ->default(1) // Valor default (padrão)
                ->after('quantity'); // Posição da coluna no banco de dados
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('min_quantity');
        });
    }
};
