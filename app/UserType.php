<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    //
    const name = "User Types";
    const WOMEN_DEPT = "women_department";
    const DEVELOPER = "developer";
    const ADMIN = "admin";
    const POVERTY_ALLEVIATION = "poverty_alleviation";
    const PRS = "prs";
    const PRINCIPAL = "principal";
    const SKILL_ACQUISITION = "skill_acquisition";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','role_name'
    ];

    public static function createRules(){
        return array(
            'name' => 'required',
            'role_name' => 'required'
        );
    }

}
