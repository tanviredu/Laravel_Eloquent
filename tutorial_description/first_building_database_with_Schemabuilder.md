1) we are using the schema builder class to make a agnostic way
of creating database
we directly add the command to the route web.php
ten after understanding the stuff we send it to the migration file
we create a books table


2)in here we create the database with the migration and the 
artisan. we do not use database with route we make it with migration
this will work as  a versio controlling for the database
and some other functionality
because the user cant have the abity to give hand on the schema 
to create the database we will give this command
    => php artisan make:migration <table_name>
    => php artisan migrate

    if you want to add relation with foreign key 
    you have to add a alter schema then add the foreign key

you have to under stand if any table has a foreign of another table
both two table have to be on the same migration file
    
3) we make another migrations called publishers
4) and we add a many to many rellation ship with  a pivot table

5) in this we are going to talk about the model
    and the crud functionality

    you always need to know the CRUD functionality 
    this is exactly what we are going to do
    
    • Creating a Model
    • Create, read, update, and delete operations basics
    • Where, aggregates, and other utilities
    • Mass assignment – for the masses  
    • Query scopes
    • Attributes casting, accessors, and mutators
    • Model events and observers
    • Descending in the code


    lets see how the models work
    lets make model
    make a model

    =>php artisan make:model Book

    this file will be under the App folder
    we add the protected $table = 'my_books'
    then go to the Route web.php file
