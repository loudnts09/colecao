<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFigurasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('figuras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->constrained('categorias', 'id')->onDelete('cascade')->onUpdate('restrict');
            $table->foreignId('prateleira_id')->constrained('prateleiras', 'id')->onDelete('cascade')->onUpdate('restrict');
            // $table->bigInteger('categoria_id')->unsigned();
            // $table->bigInteger('prateleira_id')->unsigned();
            $table->string('nome', 255);
            $table->date('lancamento');
            $table->date('recebimento')->nullable();
            $table->text('observacoes')->nullable();
            $table->string('foto', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('figuras');
    }
}
