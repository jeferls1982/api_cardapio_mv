<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->string('data');
            $table->string("hora");
            $table->string("nome_reserva");
            $table->integer("qtd_pessoas")->nullable();
            $table->string("contato");

            $table->unsignedBigInteger('cardapio_id')->nullable();
            $table->foreign('cardapio_id')->references('id')->on('cardapios')->onDelete('cascade');
            $table->timestamps();
        });

        //DB::table('reservas')->insert(array('data' => 'hoje', 'hora' => '15h', 'nome_reserva' => 'Jeferson','qtd_pessoas' => 5, 'contato' => "jeferson", 'cardapio_id' => 1 ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
