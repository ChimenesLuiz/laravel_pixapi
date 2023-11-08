<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;


class CreatePixsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('pixs', function (Blueprint $table) {
            $table->id();
            $table ->string('nome_pagante');
            $table ->string('cpf_pagante');
            $table ->string('nome_recebedor');
            $table ->enum('tipo', ['Celular', 'CPF_CNPJ', 'Email', 'Aleatoria']);
            $table ->string('chave');
            $table -> decimal('valor'); 
            $table ->enum('status', ['Realizado', 'Aguardando', 'Expirado']) -> default('Aguardando');
            $table->timestamps();
        });
        
        for ($c = 0; $c < 5; $c++)
        {
            DB::table('pixs')->insert(array(
                'nome_pagante' => 'Luiz',
                'cpf_pagante' => '08243464166',
                'nome_recebedor' => 'Larissa',
                'tipo' => 'Celular',
                'chave' => '67993449071',
                'valor' => 0.10,
                'status' => 'Aguardando'
            ));
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pixs');
    }
}
