<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';

    protected $fillable = array('title','desc_shot','desc_full','publishing_name','publishing_date','writers');

    public function Photos(){
        return $this->hasMany('App\Books_imgs',"id");
    }
}
