<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('income_id')
                ->constrained('id')
                ->on('incomes')
                ->onDelete('cascade')
                ->onUpdate('cascade'); //foranea 

            $table->foreignId('product_id')
                ->constrained('id')
                ->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade'); //foranea

            $table->integer('cantidad');
            $table->double('precio_compra')->nullable();
            $table->double('precio_venta')->nullable();
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
        Schema::dropIfExists('income_details');
    }
}
