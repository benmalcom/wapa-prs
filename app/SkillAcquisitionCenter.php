<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillAcquisitionCenter extends Model
{
    //
    protected $fillable = [
        'name','address','mobile'
    ];

    public static function createRules(){
        return array(
            'name' => 'required',
            'address' => 'required',
            'mobile' => ['required','regex:/^(\+2348|2348|08)[0-1][1-9][0-9]{7}$/']
        );
    }
}
