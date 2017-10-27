<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 19/10/2017
 * Time: 11:55 PM
 */

namespace App;
use Request;


class Helper
{

    public static function setActive($path, $active = 'active') {
        return  Request::is($path) ? $active : '';
    }

}