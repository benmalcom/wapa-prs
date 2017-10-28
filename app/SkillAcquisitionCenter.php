<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillAcquisitionCenter extends Model
{
    //
    const title = "Skill Acquisition Centers";

    protected $fillable = [
        'name','address','mobile','user_id'
    ];

    public static function createRules(){
        return array(
            'name' => 'required',
            'address' => 'required',
            'mobile' => ['required','regex:/^(\+234[7-9]|234[7-9]|0[7-9])[0-1][1-9][0-9]{7}$/']
        );
    }
}
