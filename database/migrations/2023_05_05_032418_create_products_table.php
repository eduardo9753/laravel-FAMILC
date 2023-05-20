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
            $table->id();
            $table->string('nombre', 100);
            //$table->float('precio',4,2);
            $table->string('precio');
            $table->string('slug', 50)->unique(); //PARA QUE SEA UNICO
            $table->text('descripcion');
            $table->integer('estado'); //1"activo" | 0"inactivo"
            $table->foreignId('user_id')->constrained()->references('id')->on('users');//REFERENCIA CON LA TABLA USERS
            $table->foreignId('category_id')->constrained()->references('id')->on('categories');//REFERENCIA CON LA TABLA CATEGORY            $table->timestamps();
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
