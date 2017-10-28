<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensitizationAttendee extends Model
{
    //
    const title = "Sensitization Attendees";

    protected $fillable = [
        'first_name', 'last_name', 'mobile', 'sensitization_id'
    ];

    public static function createRules(){
        return array(
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => ['required','regex:/^(\+234[7-9]|234[7-9]|0[7-9])[0-1][1-9][0-9]{7}$/']
        );
    }
}
