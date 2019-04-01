<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_managements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('author');
            $table->string('edition')->nullable();
            $table->string('session')->nullable();
            $table->integer('category_id')->unsigned()->index();
            $table->integer('sub_category_id')->unsigned()->index()->nullable();
            $table->string('page');
            $table->string('publisher');
            $table->string('language');
            $table->string('isbn')->nullable();
            $table->string('call_no')->nullable();
            $table->date('purchase_date')->nullable();
            $table->string('accession_no')->nullable();
            $table->date('doa')->nullable();
            $table->string('quantity');
            $table->string('price');
            $table->integer('shelf_id')->unsigned()->index();
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('shelf_id')->references('id')->on('shelves')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_managements');
    }
}
