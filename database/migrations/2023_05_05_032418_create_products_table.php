<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); //COMO QR 
            $table->string('nombre', 100);
            $table->string('precio'); // PPUEDES ACTUALIZAR ESTE CAMPO POR PRECIO VENTA
            $table->string('slug', 50)->unique(); //PARA QUE SEA UNICO
            $table->text('descripcion');
            $table->integer('estado'); //1"activo" | 0"inactivo"
            $table->foreignId('user_id')->constrained()->references('id')->on('users');//REFERENCIA CON LA TABLA USERS
            $table->foreignId('category_id')->constrained()->references('id')->on('categories');//REFERENCIA CON LA TABLA CATEGORY           
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
        Schema::dropIfExists('products');
    }
}
