<?php
use App\UserType;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Route::get('/', function () {
    return redirect('/home');
});

Route::resource('user-types', 'UserTypeController');

$developer = 'role:'.UserType::DEVELOPER;
$poverty_alleviation = 'role:'.UserType::POVERTY_ALLEVIATION.'|'.UserType::DEVELOPER;
$women_dept = 'role:'.UserType::WOMEN_DEPT.'|'.UserType::DEVELOPER;
$prs = 'role:'.UserType::PRS.'|'.UserType::DEVELOPER;
$principal = 'role:'.UserType::PRINCIPAL.'|'.UserType::DEVELOPER;

Route::group(['middleware'=>['auth',$poverty_alleviation]], function () {

    /*PovertyAlleviation*/
    Route::resource('skill-acquisition-centers', 'SkillAcquisitionCenterController');
    Route::resource('courses', 'CourseController');
    Route::resource('vocational-training-skills', 'VocationalTrainingSkillController');
    Route::get('cooperative-societies/{id}/new-member', 'WomenCooperativeSocietyController@getNewMember');
    Route::post('cooperative-societies/members', 'WomenCooperativeSocietyController@postMembers');
    Route::get('cooperative-societies/{id}/members', 'WomenCooperativeSocietyController@getMembers');
    Route::resource('cooperative-societies', 'WomenCooperativeSocietyController');
    Route::resource('programs', 'PovertyAlleviationProgramController');

});


Route::group(['middleware'=>['auth',$women_dept]], function () {

    /*Women Dept*/
    Route::resource('ngos', 'NgoController');
    Route::resource('domestic-violences', 'DomesticViolenceController');
});


Route::group(['middleware'=>'auth'], function () {
    Route::get('/profile','UserController@getProfile');
    Route::post('/profile','UserController@postProfile');
    Route::post('/password','UserController@postPassword');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::resource('users', 'UserController');
    Route::get('/home', 'HomeController@index')->name('home');
});