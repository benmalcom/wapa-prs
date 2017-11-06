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
    const POVERTY_ALLEVIATION = 'role:poverty_alleviation';
    const WOMEN_DEPARTMENT = 'role:'.UserType::WOMEN_DEPT.'|'.UserType::DEVELOPER.'|'.UserType::ADMIN;
    const PRS = 'role:prs';
    const PRINCIPAL = 'role:'.UserType::PRINCIPAL.'|'.UserType::SKILL_ACQUISITION.'|'.UserType::DEVELOPER.'|'.UserType::ADMIN;
    const ADMIN = 'role:'.UserType::ADMIN.'|'.UserType::DEVELOPER;
    const SKILL_ACQUISITION = 'role:'.UserType::SKILL_ACQUISITION.'|'.UserType::DEVELOPER.'|'.UserType::ADMIN;

}