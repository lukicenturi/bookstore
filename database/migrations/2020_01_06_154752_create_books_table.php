<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('borrowed_at')->nullable();
            $table->integer('lender_id');
            $table->integer('borrower_id')->nullable();
            $table->string('title');
            $table->string('author');
            $table->string('genre');
            $table->text('description');
            $table->string('cover');
            $table->enum('status', ['available', 'unavailable'])->default('available');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('books');
    }
}
