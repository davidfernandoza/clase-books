<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('lends', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_user_id')->unsigned();
            $table->bigInteger('owner_user_id')->unsigned()->nullable();
            $table->bigInteger('book_id')->unsigned();
            $table->date('date_out')->nullable();
            $table->date('date_in')->nullable();
            $table->date('date_request')->nullable(); // date_request -> No sale en los videos, fecha de solicitud
            $table->enum('status', ['PRESTADO', 'SOLICITADO', 'EN SALA'])->default('EN SALA'); // Se cambia y agrega SOLICITADO, esto para que el usuario basico pueda solicitar un libro.
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lends');
    }
};
