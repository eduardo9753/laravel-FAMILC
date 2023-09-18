<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')
                ->nullable()
                ->constrained('id')
                ->on('people')
                ->nullOnDelete('true'); //foranea cliente

            $table->string('tipo_comprobante')->nullable();
            $table->string('numero_comprobante')->nullable();
            $table->dateTime('fecha')->nullable();
            $table->double('inpuesto')->nullable();
            $table->double('total_venta')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
