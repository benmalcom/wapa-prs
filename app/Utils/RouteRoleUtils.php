<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 19/10/2017
 * Time: 10:49 AM
 */

namespace App\Utils;
use App\UserType;


class RouteRoleUtils
{
    const DEVELOPER = 'role:'.UserType::DEVELOPER;
    const POVERTY_ALLEVIATION = 'role:'.UserType::POVERTY_ALLEVIATION.'|'.UserType::DEVELOPER;
    const WOMEN_DEPARTMENT = 'role:'.UserType::WOMEN_DEPT.'|'.UserType::DEVELOPER;
    const PRS = 'role:'.UserType::PRS.'|'.UserType::DEVELOPER;
    const PRINCIPAL = 'role:'.UserType::PRINCIPAL.'|'.UserType::DEVELOPER;
    const ADMIN = 'role:'.UserType::ADMIN.'|'.UserType::DEVELOPER;
    const SKILL_ACQUISITION = 'role:'.UserType::SKILL_ACQUISITION.'|'.UserType::DEVELOPER;

}