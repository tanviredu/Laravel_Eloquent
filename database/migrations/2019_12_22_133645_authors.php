<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Authors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // every thign is loaded now all you have to do is the 
        // write the table name
	Schema::create('authors',function(Blueprint $table){
		// all the table column
		$table->increments('id')->unsigned()->index();
		$table->string('first_name');
		$table->string('last_name');
		$table->timestamps();
    });

    Schema::create('books',function(Blueprint $table){

        // 		// the table defination goes here
                $table->index('title'); 
                $table->increments('id');
                $table->string('title',10);
                $table->integer('pages_count');
                $table->decimal('price',5,2);
                $table->text('description');
                $table->timestamps();
                $table->integer('author_id')->unsigned()->index();                
        
            });


    Schema::table('books',function(Blueprint $table){
        $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
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
    }
}
