<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/**
 * this is the many to many reationship
 * imagine you have to specfy sometags for every book you store in your application
 * this time you have two things to do
 * 1) create a tags table to store the tags
 * 2) and there will be another table that are going to
 *  store tag_id with book_id
 * its many to many relationship
 * becaus there can be many tag related to one book
 * all the tag are stored in the tag table 
 * and the relation will be stored in the book_tag
 * 
 */



class TagsUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //here goes the tags
        Schema::create('tags',function(Blueprint $table){
            $table->increments('id')->index();
            $table->string('name');
            $table->timestamps();
        });


        // this is the pivot table
        // tag will store the tags
        // with a id
        // and the book_tags will store
        // the book_id from the books
        // and the tag id from the tags
        // the book_tag table store the information
        // about which book contain which tag
        // remember an extra table is always used when 
        // you need many to many relationship
        Schema::create('book_tag',function(Blueprint $table){
            $table->increments('id')->index();
            $table->integer('book_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            // foreign key declared here
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('tag_id')->references('id')->on('tags');


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
