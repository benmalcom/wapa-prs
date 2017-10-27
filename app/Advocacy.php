<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advocacy extends Model
{
    const title = "Advocacy";
    //
    protected $fillable = [
        'title'
    ];

    public static function createRules(){
        return array(
            'title' => 'required'
        );
    }

    public function attendees(){
        return $this->hasMany('\App\AdvocacyAttendee','advocacy_id');
    }
}
