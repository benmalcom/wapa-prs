<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensitization extends Model
{
    //
    const title = "Sensitization";
    protected $fillable = [
        'title'
    ];

    public static function createRules(){
        return array(
            'title' => 'required'
        );
    }

    public function attendees(){
        return $this->hasMany('\App\SensitizationAttendee','sensitization_id');
    }
}
