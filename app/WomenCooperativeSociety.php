<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WomenCooperativeSociety extends Model
{

    const title = "Women Cooperative Societies";
    protected $table = 'women_cooperative_societies';
    //
    protected $fillable = [
        'name','division','sub_division'
    ];

    public static function createRules(){
        return array(
            'name' => 'required',
            'division' => 'required'
        );
    }

    public function members(){
        return $this->hasMany('\App\Member','cooperative_society_id');
    }
}