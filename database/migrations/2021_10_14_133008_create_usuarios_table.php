<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('usuarios')) {

            Schema::create('usuarios', function (Blueprint $table) {
                $table->id();
                $table->string('nome_usuario');
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
        Schema::dropIfExists('usuarios');
    }
}
