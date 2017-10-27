<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ngo extends Model
{
    //
    const title = "Non-Governmental Organizations";
    protected $fillable = [
        'name','address','registrar'
    ];

    public static function createRules(){
        return array(
            'name' => 'required',
            'address' => 'required',
            'registrar' => 'required'
        );
    }
}
