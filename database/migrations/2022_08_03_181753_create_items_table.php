<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->decimal("calorias");
            $table->timestamps();
        });

        DB::table('items')->insert(array('nome' => 'feijão', 'calorias' => 156.5));
        DB::table('items')->insert(array('nome' => 'arroz', 'calorias' => 120.5));
        DB::table('items')->insert(array('nome' => 'pao', 'calorias' => 256.5));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
