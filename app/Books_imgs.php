<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books_imgs extends Model
{
    protected $table = 'books_imgs';
    protected $primaryKey = 'id';

    protected $fillable = array('id','book_id','file_name','name');


}
