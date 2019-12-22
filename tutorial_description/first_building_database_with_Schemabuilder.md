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