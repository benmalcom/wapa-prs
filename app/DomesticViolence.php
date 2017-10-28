<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DomesticViolence extends Model
{
    //
    const title = "Domestic Violence";
    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'lga_of_residence',
        'mobile',
        'email',
        'age',
        'marital_status', 'type_of_violence',
        'conclusion',
        'educational_qualification',
        'country',
        'state_id',
        'lga_id',
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
           'mobile'  => ['required','regex:/^(\+234[7-9]|234[7-9]|0[7-9])[0-1][1-9][0-9]{7}$/'],
           'age'  => 'required',
           'marital_status'  => 'required',
           'type_of_violence'  => 'required',
           'conclusion' => 'required',
           'educational_qualification'  => 'required',
           'country'  => 'required',
           'state_id'  => 'required',
           'lga_id'  => 'required',
           );
    }

    public static function country()
    {
        return array(
            'Nigeria',
            'Others',
        );
    }

    public static function type()
    {
        return array(
            'Physical Abuse', 'Sexual Abuse',
            'Starvation', 'Economic Abuse/ Exploitation',
            'Hazardous Attack', 'Damage to Property',
            'Deprivation'
        );
    }

    public static function conclusion()
    {
        return array(
            'Settled Matter',
            'Referral to other Agencies',
            'Matter still on-going',
            'Client Disengagement',
            'Follow up Matters'
        );
    }

    public static function maritalStatus()
    {
        return array(
            'Single',
            'Married',
            'Divorced',
            'Widow',
            'Separated',
            'Others'
        );
    }

    public static function educationalQualifications()
    {
        return array(
            'None',
            'Primary School Leaving Certificate',
            'JSCE',
            'SSCE',
            'Other Technical Certificate',
            'OND',
            'HND',
            'BSc',
            'MSc/Others'
        );
    }
}
