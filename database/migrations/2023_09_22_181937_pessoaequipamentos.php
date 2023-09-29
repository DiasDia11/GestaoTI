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
        Schema::create('pessoaequipamento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pessoa_id');
            $table->unsignedBigInteger('equipamento_id');
            $table->timestamps();

            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            $table->foreign('equipamento_id')->references('id')->on('equipamentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('pessoaequipamento', function (Blueprint $table) {
            $table->dropForeign(['pessoa_id']);
            $table->dropForeign(['pessoa_id']);

            $table->timestamps();
            $table->unsignedBigInteger('equipamento_id');
            $table->unsignedBigInteger('pessoa_id');
            $table->id();
        });
    }
};
