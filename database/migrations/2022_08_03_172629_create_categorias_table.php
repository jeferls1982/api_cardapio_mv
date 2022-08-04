<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->timestamps();
        });


        DB::table('categorias')->insert(array('nome' => 'Entrada'));
        DB::table('categorias')->insert(array('nome' => 'Principal'));
        DB::table('categorias')->insert(array('nome' => 'Sobremesa'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
