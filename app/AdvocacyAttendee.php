<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvocacyAttendee extends Model
{
    //
    const title = "Advocacy Attendees";
    protected $fillable = [
        'first_name', 'last_name', 'mobile', 'advocacy_id'
    ];

    public static function createRules(){
        return array(
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => ['required','regex:/^(\+234[7-9]|234[7-9]|0[7-9])[0-1][1-9][0-9]{7}$/']
        );
    }

}
