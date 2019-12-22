<?php

/*
* rememer this is not ideal to add a database schema 
* in the route we just put here for education purpose
*	and you can do preety much everything in everywhre

*/
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

# use Illuminate\Database\Schema\Blueprint


Route::get('/', function () {
    return view('welcome');
});


// this route will trigger the database 
// to make a new table in the database

Route::get('create_books_table',function(){
	// this is the Schema class
	// it will take parameter
	// first the table name
	// and the infamous callback function
	// and the call back function takes the "Blueprint $table"
	// parameter
	Schema::create('books',function(Blueprint $table){

		// the table defination goes here
		$table->increments('id');
		$table->string('title',10);
		$table->integer('pages_count');
		$table->decimal('price',5,2);
		$table->text('description');
		$table->timestamps();
		// this time stamp will create two column
		// created at and updated at
		// remember you can only execute this one time

	
		

	});

	// when you do to the route this table will be created
});


Route::get('search_column',function(){
	// we gonna search the column exists or not
	// search a column
	// it takes two parameter
	// table and the column

	// this will return true
	if(Schema::hasColumn('books','title')){
		echo "the column is exists";
	}

	// this will return false
	if(Schema::hasColumn('books','dummy')){
		echo "the column is exists";
	}

});

// now create a dummy table with all kinds of data type with
// descritpion


Route::get('create_dummy_database',function(){
	Schema::create('dummy',function(Blueprint $table){
		// create all kinds of column
		$table->increments('id');
		$table->string('name',10);
		$table->string('email',15);
		$table->boolean('confirmed');
		$table->text('description');
		$table->timestamps();
		
		

	});
});





/**
 * 
 * $table->timestamps() will create two table 
 * which is created at and the updated at
 * eloquent willl automatically takes care of the creatred at and the updated at
 * ypu application wmay not work roperly
 * if there is no timestamps
 */

 //update the table

 Route::get('update_table',function(){
		
		// it will take the two parameter 
		// the table name and also
		// the callback funtion
		// and iot will take the Schema::table()
		Schema::table('books',function(Blueprint $table){
			// we select the column the table whiich we want to update
			// you can change the existing column
			// by this 
			$table->string('title',220)->change();

			// if you want to add a column just add it here
			$table->string('book_owner',200);

			// to change this column you may need a dependency
			// it can show the epemndency problem
			// just use install this package

			//composer require doctrine/dbal
			// this will solve the problem

		});
 });





// make aanother table with the author


// make a two table with working with the foreign key
// we will create the authors and the books column

Route::get('updated_table',function(){

	// first create the author table
	Schema::create('authors',function(Blueprint $table){
		// all the table column
		$table->increments('id');
		$table->string('first_name');
		$table->string('last_name');
		$table->timestamps();
	});



	// we alter the table to support the
	// foreign key

	Schema::table('books',function(Blueprint $table){

		$table->index('title'); 
		// this will add the title index colum to the 
		// table

		// craete the foreigh key
		// create a author id that will add with 
		// the author table column id
		$table->integer('author_id')->unsigned();

		// ma ethe foreign key
		$table->foreign('author_id')->references('id')->on('authors');


	});

});