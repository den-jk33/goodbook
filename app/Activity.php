<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Activity extends Model
{
    protected $table = 'activity';
    protected $fillable = array('url','visit_at');
    public $timestamps = false;

    public static function validate_and_save($data){

        //  Or in make:request
        $rules = [
            'url' => 'required|max:300|min:3|url',
            'visit_at' => 'required|date'
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) return $validator->errors()->all();
        $id = self::create($validator->validated())->id;

        return $id;
    }

}
