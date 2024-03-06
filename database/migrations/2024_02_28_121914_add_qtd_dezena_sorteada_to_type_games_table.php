<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQtdDezenaSorteadaToTypeGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('type_games', function (Blueprint $table) {
            $table->integer('qtd_dezena_sorteada')->default(0)->before('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('type_games', function (Blueprint $table) {
            $table->dropColumn('qtd_dezena_sorteada');
        });
    }
}
