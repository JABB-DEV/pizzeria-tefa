<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomiciliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilios', function (Blueprint $table) {
            $table->id();
            $table->integer("cp");	
            $table->text("colonia");
            $table->text("calle");
            $table->text("referencia")->nullable();
            $table->text("numero_i")->nullable();
            $table->text("numero_e")->nullable();
            $table->text("telefono");
            $table->text("ext")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domicilios');
    }
}
