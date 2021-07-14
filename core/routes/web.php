<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController@index')->name('index');
Route::get('/contact', 'IndexController@contact')->name('contact');
Route::get('/about', 'IndexController@about')->name('about');
Route::post('/save/subscribe', 'IndexController@saveSubscribe')->name('save.subscribe');
Route::post('/save/contact', 'IndexController@saveContact')->name('save.contact');
Route::post('/save/request/demo', 'IndexController@saveRequestDemo')->name('save.request.demo');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function (){
    Route::get('/', 'AdminController@index')->name('admin.login');
    Route::post('/login', 'AdminController@loginCheck')->name('admin.loginCheck');

    Route::get('/register', 'AdminController@adminRegister')->name('admin.register');
    Route::post('/save/register', 'AdminController@adminSaveRegister')->name('admin.save.register');

    Route::middleware('auth:admin')->group(function (){
        Route::get('/dashboard', 'AdminController@adminDashboard')->name('admin.dashboard');
        Route::get('/logout', 'AdminController@adminLogout')->name('admin.logout');

        Route::get('/profile', 'AdminController@profile')->name('profile');

        Route::get('/change/password', 'AdminController@changePassword')->name('change.password');
        Route::post('/submit/change/password', 'AdminController@submitChangePassword')->name('submit.change.password');

        Route::get('/get-district', 'ManagerController@getDistrict'); //ajax request
        Route::get('/get-upazila', 'ManagerController@getUpazila'); //ajax request

        /*Question Category*/
        Route::get('/add/question/category', 'QuestionController@addQuestionCategory')->name('add.question.category');
        Route::post('/save/question/category', 'QuestionController@saveQuestionCategory')->name('save.question.category');
        Route::get('/manage/question/category', 'QuestionController@manageQuestionCategory')->name('manage.question.category');
        Route::get('/edit/question/category/{id}', 'QuestionController@editQuestionCategory')->name('edit.question.category');
        Route::post('/update/question/category', 'QuestionController@updateQuestionCategory')->name('update.question.category');
        Route::post('/delete/question/category', 'QuestionController@deleteQuestionCategory')->name('delete.question.category');
        /*Question*/
        Route::get('/add/question', 'QuestionController@addQuestion')->name('add.question');
        Route::post('/save/question', 'QuestionController@saveQuestion')->name('save.question');
        Route::get('/question/category/list', 'QuestionController@questionCategoryList')->name('question.category.list');
        Route::get('/manage/question/{id}', 'QuestionController@manageQuestion')->name('manage.question');
        Route::get('/edit/question/{id}', 'QuestionController@editQuestion')->name('edit.question');
        Route::post('/update/question', 'QuestionController@updateQuestion')->name('update.question');
        Route::post('/delete/question', 'QuestionController@deleteQuestion')->name('delete.question');

        /*Manager*/
        Route::get('/add/manager', 'ManagerController@addManager')->name('add.manager');
        Route::post('/save/manager', 'ManagerController@saveManager')->name('save.manager');
        Route::get('/manage/manager', 'ManagerController@manageManager')->name('manage.manager');
        Route::get('/edit/manager/{id}', 'ManagerController@editManager')->name('edit.manager');
        Route::post('/update/manager', 'ManagerController@updateManager')->name('update.manager');
        Route::post('/delete/manager', 'ManagerController@deleteManager')->name('delete.manager');
        /*User*/
        Route::get('/add/user', 'UserController@addUser')->name('add.user');
        Route::post('/save/user', 'UserController@saveUser')->name('save.user');
        Route::get('/manage/user', 'UserController@manageUser')->name('manage.user');
        Route::get('/edit/user/{id}', 'UserController@editUser')->name('edit.user');
        Route::post('/update/user', 'UserController@updateUser')->name('update.user');
        Route::post('/delete/user', 'UserController@deleteUser')->name('delete.user');

        Route::get('/show/answer', 'QuestionController@showAnswer')->name('show.answer');
        /* Subscriber List */
        Route::get('/subscriber/list', 'AdminController@subscriberList')->name('subscriber.list');
        Route::post('/delete/subscriber', 'AdminController@deleteSubscriber')->name('delete.subscriber');
        /* Contact List */
        Route::get('/contact/list', 'AdminController@contactList')->name('contact.list');
        Route::post('/delete/contact', 'AdminController@deleteContact')->name('delete.contact');
        Route::get('/request/demo', 'AdminController@requestDemoList')->name('request.demo');
        Route::post('/delete/request/demo', 'AdminController@deleteRequestDemo')->name('delete.request.demo');


        // answer
        Route::get('/show/answer', 'QuestionController@showAnswer')->name('show.answer');
        Route::get('/view/answer/{id}', 'QuestionController@viewAnswer')->name('view_answer');

        //maps
        Route::get('/show/maps/{id}', 'QuestionController@showMaps')->name('show.maps');
        Route::get('/all/maps/', 'QuestionController@showMapsAll')->name('show.maps.all');

        // Notification
        Route::get('/all/notfication/', 'QuestionController@NotifyController')->name('notify.all');

        Route::get('message/{id}', 'MessageController@index')->name('message');
        
        Route::get('message/box/{id}', 'MessageController@messageBox')->name('message.box');

        Route::post('message/user2', 'MessageController@message2User')->name('message2.user');
    });
});
