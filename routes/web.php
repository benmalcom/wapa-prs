<?php
use App\Utils\RouteRoleUtils;
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



Route::group(['middleware'=>'auth'], function () {

    /*PovertyAlleviation*/

    Route::get('cooperative-societies/{id}/new-member', 'WomenCooperativeSocietyController@getNewMember')
        ->name('newMember');
    Route::post('cooperative-societies/members', 'WomenCooperativeSocietyController@postMembers')
        ->name('postMember');
    Route::get('cooperative-societies/{id}/members', 'WomenCooperativeSocietyController@getMembers')
        ->name('getMembers');
    Route::resource('cooperative-societies', 'WomenCooperativeSocietyController');
    Route::resource('programs', 'PovertyAlleviationProgramController');


});

Route::group(['middleware'=> 'auth'], function () {
    Route::resource('skill-acquisition-centers', 'SkillAcquisitionCenterController');
    Route::resource('courses', 'CourseController');
    Route::resource('vocational-training-skills', 'VocationalTrainingSkillController');
});




Route::group(['middleware'=>'auth'], function () {

    /*Women Dept*/
    Route::resource('ngos', 'NgoController');
    Route::resource('domestic-violences', 'DomesticViolenceController');
    Route::resource('short-term-skills', 'ShortTermSkillController');

    Route::resource('advocacies', 'AdvocacyController');
    Route::resource('advocacies.attendees', 'AdvocacyAttendeeController');

    Route::resource('sensitizations', 'SensitizationController');
    Route::resource('sensitizations.attendees', 'SensitizationAttendeeController');
});


Route::group(['middleware'=>'auth'], function () {
    Route::get('/profile','UserController@getProfile');
    Route::post('/profile','UserController@postProfile');
    Route::post('/password','UserController@postPassword');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::resource('users', 'UserController');
    Route::get('/home', 'HomeController@index')->name('home');
});