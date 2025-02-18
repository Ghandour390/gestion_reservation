<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  Schema::create('reservation', function (Blueprint $table) {
        $table->id();
        $table->integer('user_id');
        $table->integer('salle_id');
        $table->enum('status', ['pending', 'en cours', 'terminer'])->default('pending');
        $table->date('date_dubee');
        $table->date('date_finall');
        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('salle_id')->references('id')->on('salles');

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation');
    }
};
