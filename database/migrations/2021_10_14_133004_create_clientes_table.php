<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clientes')) {

            Schema::create('clientes', function (Blueprint $table) {
                $table->id();
                $table->string('nome_cliente');
                $table->string('senha');
                $table->unsignedBigInteger('pessoa_id');

                $table->foreign('pessoa_id')->references('id')->on('pessoas');

                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
