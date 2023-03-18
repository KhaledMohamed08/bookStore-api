<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('description');
            $table->integer("price");
            $table->string('image');
            $table->foreignId('user_id')
            ->constrained('users');
            $table->foreignId('writer_id')
            ->constrained('writers');
            $table->foreignId('category_id')
            ->constrained('categories');
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
        Schema::dropIfExists('books');
    }
};
