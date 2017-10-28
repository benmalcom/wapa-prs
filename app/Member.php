<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    const title = "Cooperative Society Members";
    protected $table = "cooperative_society_members";
    protected $fillable = [
        'first_name','last_name','mobile','skill','cooperative_society_id'
    ];

    public static function createRules(){
        return array(
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => ['required','regex:/^(\+234[7-9]|234[7-9]|0[7-9])[0-1][1-9][0-9]{7}$/'],
            'skill' => 'required',
            'cooperative_society_id' => 'required'
        );
    }
}
