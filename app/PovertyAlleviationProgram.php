<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PovertyAlleviationProgram extends Model
{
    //
    const title = "Poverty Alleviation Program";
    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'lga_of_residence',
        'mobile',
        'age',
        'number_of_children',
        'type_of_work',
        'place_of_work',
        'educational_qualification',
        'country',
        'state_id',
        'lga_id',
        'nok_mobile',
        'nok_email',
        'nok_address',
    ];

    public function state(){
        return $this->belongsTo('\App\State','state_id');
    }

    public function lga(){
        return $this->belongsTo('\App\Lga','lga_id');
    }

    public static function createRules()
    {
        return array(
            'first_name' => 'required',
            'last_name'  => 'required',
            'address'  => 'required',
            'lga_of_residence'  => 'required',
            'mobile'  => ['required','regex:/^(\+2348|2348|08)[0-1][1-9][0-9]{7}$/'],
            'age'  => 'required',
            'number_of_children'  => 'required',
            'type_of_work'  => 'required',
            'place_of_work'  => 'required',
            'educational_qualification'  => 'required',
            'country'  => 'required',
            'state_id'  => 'required',
            'lga_id'  => 'required',
            'nok_mobile' => ['required','regex:/^(\+2348|2348|08)[0-1][1-9][0-9]{7}$/'],
            'nok_email' => 'required',
            'nok_address' => 'required',
        );
    }

    public static function countries()
    {
        return array(
            'Nigeria',
            'Others',
        );
    }

    public static function workTypes()
    {
        return array(
            'Skilled',
            'Unskilled',
        );
    }

    public static function ages()
    {
        return array(
            'Under 40 years',
            '40 - 55 years',
            'Above 55 years'
        );
    }

    public static function educationalQualifications()
    {
        return array(
            'None',
            'Primary School Leaving Certificate',
            'JSCE',
            'Other Technical Certificate',
            'OND',
            'HND',
            'BSc',
            'MSc/Others'
        );
    }
}
