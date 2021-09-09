<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
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
            $table->string('title', 30)->nullable($value = false);
            $table->json('category')->nullable($value = false);
            $table->decimal('price', 6,2)->nullable($value = false);
            $table->string('author')->nullable($value = false);
            $table->date('publish_year');
            $table->smallInteger('stock');
            $table->string('cover_image', 256)->nullable();
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
}
