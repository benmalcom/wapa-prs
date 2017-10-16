<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    //

    const WOMEN_DEPT = "women_dept";
    const DEVELOPER = "developer";
    const POVERTY_ALLEVIATION = "poverty_alleviation";
    const PRS = "prs";
    const PRINCIPAL = "principal";

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
