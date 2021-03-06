<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationalBackground extends Model
{
    //
    const name = "Educational Backgrounds";
    protected $table = "educational_backgrounds";
    protected $fillable = [
        'institution','qualification','from','to','model','model_id'
    ];

    public static function createRules(){
        return array(
            'education.*.institution' => 'required',
            'education.*.qualification' => 'required',
            'education.*.from' => 'required',
            'education.*.to' => 'required',
        );
    }

    public static function createRulesSingle(){
        return array(
            'institution' => 'required',
            'qualification' => 'required',
            'from' => 'required',
            'to' => 'required',
        );
    }
}
