<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->id('id_annonce');
            $table->timestamps();
            $table->string('title');
            $table->string('description');
            $table->string('price');
            $table->string('id_vendor');
            $table->string('picture1');
            $table->string('picture2');
            $table->string('picture3');
            $table->string('picture4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annonces');
    }
}
