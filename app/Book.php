<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // lets add the protected table here
    // we willt talk about it later
    protected $table = 'books';
    // now go to the route -> web.php
    // and find apply CRUD
}
