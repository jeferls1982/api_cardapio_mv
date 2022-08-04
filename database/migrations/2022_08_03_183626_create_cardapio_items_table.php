<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardapioItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardapio_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('item_id')->nullable();
            $table->foreign('item_id')->references('id')->on('items');

            $table->unsignedBigInteger('cardapio_id')->nullable();
            $table->foreign('cardapio_id')->references('id')->on('cardapios');
            $table->timestamps();
        });

        DB::table('cardapio_items')->insert(array('item_id' => 1, 'cardapio_id' => 1));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cardapio_items');
    }
}
