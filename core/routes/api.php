<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//User Login & Registration
//Route::get('userlist', 'Api\AdminController@index');
//Route::get('userlist/{id}', 'Api\AdminController@singleUser');
//Route::post('user/registration', 'Api\AdminController@saveAdmin');
//Route::post('user/login', 'Api\AdminController@userLogin');

Route::post('user_register', 'Api\AdminController@userRegistration');

Route::group(['prefix' => 'location'], function () {

    Route::post('login', 'Api\UserController@login');
    Route::post('logout', 'Api\UserController@logout');
    Route::post('refresh', 'Api\UserController@refresh');
    Route::post('me', 'Api\UserController@me');

    Route::post('update/profile', 'Api\AdminController@updateProfile');
    Route::post('change/password', 'Api\AdminController@changePassword');

    Route::get('question/list/', 'Api\QuestionController@questionList');
    Route::post('question/submit', 'Api\QuestionController@questionSubmit');

    Route::get('division/list', 'Api\AreaController@divisionList');
    Route::get('division/{id}', 'Api\AreaController@division');

    Route::get('district/list', 'Api\AreaController@districtList');
    Route::get('district/{id}', 'Api\AreaController@district');

    Route::get('upazila/list', 'Api\AreaController@upazilaList');
    Route::get('upazila/{id}', 'Api\AreaController@upazila');

    Route::get('union/list', 'Api\AreaController@unionList');
    Route::get('union/{id}', 'Api\AreaController@union');

    Route::get('unique_id/list', 'Api\AreaController@uniqueIDList');
    Route::get('unique_id/{id}', 'Api\AreaController@uniqueID');

    Route::post('notification', 'Api\NotificationController@submitNotification');
    Route::get('message', 'Api\NotificationController@GetNotification');

    Route::get('role', 'Api\RoleController@GetRole');
    Route::get('organization', 'Api\OrganizationController@GetOrganization');

    
});
