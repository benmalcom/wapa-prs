<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    const title = "Courses";
    protected $fillable = [
        'name'
    ];

    public static function createRules(){
        return array(
            'name' => 'required'
        );
    }
}
