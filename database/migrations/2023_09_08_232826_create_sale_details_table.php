<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')
                ->constrained('id')
                ->on('sales')
                ->onDelete('cascade')
                ->onUpdate('cascade'); //foranea

            $table->foreignId('product_id')
                ->constrained('id')
                ->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade'); //foranea

            $table->integer('cantidad');
            $table->double('precio_venta')->nullable();
            $table->double('descuento')->nullable();
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
        Schema::dropIfExists('sale_details');
    }
}
