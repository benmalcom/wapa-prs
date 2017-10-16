<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $table = "cooperative_society_members";
    protected $fillable = [
        'first_name','last_name','mobile','skill','cooperative_society_id'
    ];

    public static function createRules(){
        return array(
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'skill' => 'required',
            'cooperative_society_id' => 'required'
        );
    }
}
