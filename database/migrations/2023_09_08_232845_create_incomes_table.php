<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')
                ->nullable()
                ->constrained('id')
                ->on('people')
                ->nullOnDelete('true'); //foranea proveedor

            $table->string('tipo_documento')->nullable();
            $table->string('numero_documento')->nullable();
            $table->dateTime('fecha')->nullable();
            $table->double('inpuesto')->nullable();
            $table->string('estado')->nullable();
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
        Schema::dropIfExists('incomes');
    }
}
