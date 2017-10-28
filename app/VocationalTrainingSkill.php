<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VocationalTrainingSkill extends Model
{
    //
    const title = "Vocational Training and Skills";
    protected $table = "vocational_training_skills";

    protected $fillable = [
        'lasrra_no',
        'first_name',
        'last_name',
        'postal_address',
        'permanent_address',

        'course_id',
        'center_id',

        'disability',
        'disability_nature',

        'marital_status',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'mobile',

        'engagement_status',
        'engagement_details',
        'other_information',

        'nok_name',
        'nok_mobile',
        'nok_address',
        'nok_occupation',
        'nok_relationship',

        'country',
        'state_id',
        'lga_id'
    ];

    public function educationalBackground() {
        return $this->hasMany('App\EducationalBackground', 'model_id');
    }

    public static function createRules()
    {
        return array(
            'lasrra_no' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
/*            'postal_address',
            'permanent_address',*/

            'course_id' => 'required',
            'center_id' => 'required',


            'marital_status' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'mobile' => ['required','regex:/^(\+234[7-9]|234[7-9]|0[7-9])[0-1][1-9][0-9]{7}$/'],
            'disability' => 'required',
            'disability_nature' => 'required_if:disability,==,Yes',

            'engagement_status' => 'required',
            'engagement_details' => 'required_if:engagement_status,==,Yes',
/*            'other_information' => 'required',*/

            'nok_name' => 'required',
            'nok_mobile' => ['required','regex:/^(\+234[7-9]|234[7-9]|0[7-9])[0-1][1-9][0-9]{7}$/'],
            'nok_address' => 'required',
            'nok_occupation' => 'required',
            'nok_relationship' => 'required',

            'country' => 'required'
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

    public static function countries()
    {
        return array(
            'Nigeria',
            'Others',
        );
    }

    public static function genders()
    {
        return array(
            'Male',
            'Female',
        );
    }

    public static function disabilities()
    {
        return array(
            'Yes',
            'No',
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
            'SSCE',
            'Other Technical Certificate',
            'OND',
            'HND',
            'BSc',
            'MSc/Others'
        );
    }

    public function state(){
        return $this->belongsTo('\App\State','state_id');
    }

    public function lga(){
        return $this->belongsTo('\App\Lga','lga_id');
    }

    public function course(){
        return $this->belongsTo('\App\Course','course_id');
    }

    public function center(){
        return $this->belongsTo('\App\SkillAcquisitionCenter','center_id');
    }

}
