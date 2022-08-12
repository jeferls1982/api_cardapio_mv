<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardapiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardapios', function (Blueprint $table) {
            $table->id();
            $table->string("titulo");
            $table->text("descricao");
            $table->string("foto");
            $table->decimal("preco");

            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

            $table->timestamps();
        });


        // DB::table('cardapios')->insert(array('titulo' => 'Almoço', 'descricao' => 'Almoço', 'foto' => 'Almoço','preco' => 1.99, 'categoria_id' => 1));
        // DB::table('cardapios')->insert(array('titulo' => 'janta', 'descricao' => 'janta', 'foto' => 'janta','preco' => 10.99, 'categoria_id' => 2));
        //DB::table('cardapios')->insert(array('titulo' => 'cafe', 'descricao' => 'cafe', 'foto' => 'cafe','preco' => 0.99, 'categoria_id' => 3));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cardapios');
    }
}
