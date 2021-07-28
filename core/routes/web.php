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

/* User Panel */
Route::group(['prefix' => 'user'], function (){
    Route::get('/', 'UserController@index')->name('user.login');
    Route::post('/login', 'UserController@loginCheck')->name('user.loginCheck');

    Route::middleware('auth:web')->group(function (){
        Route::get('/dashboard', 'UserController@userDashboard')->name('user.dashboard');
        Route::get('/logout', 'UserController@userLogout')->name('user.logout');

        Route::get('/profile', 'UserController@profile')->name('user.profile');

        Route::get('/change/password', 'UserController@changePassword')->name('user.change.password');
        Route::post('/submit/change/password', 'UserController@submitChangePassword')->name('user.submit.change.password');

        Route::get('/get-district', 'SurveyController@getDistrict'); //ajax request
        Route::get('/get-upazila', 'SurveyController@getUpazila'); //ajax request
        Route::get('/get-patient-name-phone', 'SurveyController@getPatientNamePhone'); //ajax request

        /* Start Survey */
        Route::get('/start/survey', 'SurveyController@startSurvey')->name('start.survey');
        Route::post('/submit/survey', 'SurveyController@submitSurvey')->name('submit.survey');

        Route::get('/collected/data', 'SurveyController@userCollectedData')->name('user.collected.data');
        Route::get('/view/collected/data/{id}/{user_id}', 'SurveyController@userViewCollectedData')->name('user.view.collected.data');

        //message
        Route::get('message', 'UserMessageController@messageindex')->name('user.message');
        Route::get('message/get/', 'UserMessageController@messageGet')->name('get.message');
        Route::post('sent/message', 'UserMessageController@messageSent')->name('sent.message');
    });
});

/* Admin/Manager Panel */
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
        Route::get('/get-answer', 'QuestionController@getAnswer'); //ajax request

        /*Question Category*/
        Route::get('/add/question/category', 'QuestionController@addQuestionCategory')->name('add.question.category');
        Route::post('/save/question/category', 'QuestionController@saveQuestionCategory')->name('save.question.category');
        Route::get('/manage/question/category', 'QuestionController@manageQuestionCategory')->name('manage.question.category');
        Route::post('/get-question-category', 'QuestionController@getQuestionCategory')->name('get.question.category');
        Route::get('/edit/question/category/{id}', 'QuestionController@editQuestionCategory')->name('edit.question.category');
        Route::post('/update/question/category', 'QuestionController@updateQuestionCategory')->name('update.question.category');
        Route::post('/delete/question/category', 'QuestionController@deleteQuestionCategory')->name('delete.question.category');
        /*Question*/
        Route::get('/add/question', 'QuestionController@addQuestion')->name('add.question');
        Route::post('/save/question', 'QuestionController@saveQuestion')->name('save.question');
        Route::get('/question/category/list', 'QuestionController@questionCategoryList')->name('question.category.list');
        Route::post('/get-question-category-filter', 'QuestionController@questionCategoryFilter')->name('question.category.filter');
        Route::get('/manage/question/{id}', 'QuestionController@manageQuestion')->name('manage.question');
        Route::post('/get-question', 'QuestionController@getQuestion')->name('get.question');
        Route::get('/edit/question/{id}', 'QuestionController@editQuestion')->name('edit.question');
        Route::post('/update/question', 'QuestionController@updateQuestion')->name('update.question');
        Route::post('/delete/question', 'QuestionController@deleteQuestion')->name('delete.question');

        /*Manager*/
        Route::get('/add/manager', 'ManagerController@addManager')->name('add.manager');
        Route::post('/save/manager', 'ManagerController@saveManager')->name('save.manager');
        Route::get('/manage/manager', 'ManagerController@manageManager')->name('manage.manager');
        Route::post('/get-manager', 'ManagerController@getManager')->name('get.manager');
        Route::get('/edit/manager/{id}', 'ManagerController@editManager')->name('edit.manager');
        Route::post('/update/manager', 'ManagerController@updateManager')->name('update.manager');
        Route::post('/delete/manager', 'ManagerController@deleteManager')->name('delete.manager');
        /*User*/
        Route::get('/add/user', 'UserController@addUser')->name('add.user');
        Route::post('/save/user', 'UserController@saveUser')->name('save.user');
        Route::get('/manage/user', 'UserController@manageUser')->name('manage.user');
        Route::post('/get-user', 'UserController@getUser')->name('get.user');
        Route::get('/edit/user/{id}', 'UserController@editUser')->name('edit.user');
        Route::post('/update/user', 'UserController@updateUser')->name('update.user');
        Route::post('/delete/user', 'UserController@deleteUser')->name('delete.user');

        /* User Track */
        Route::get('/user/track', 'UserController@adminUserTrack')->name('admin.user.track');
        Route::post('/get-user-track', 'UserController@getUserTrack')->name('get.user.track');
        Route::get('/view/login/history/{id}', 'UserController@viewLoginHistory')->name('admin.view.login.history');
        Route::get('/view/user/servey/{id}', 'UserController@viewUserServey')->name('admin.view.user.servey');
        Route::post('/get-user-survey', 'UserController@getUserServey')->name('get.user.servey');

        Route::get('/show/answer', 'QuestionController@showAnswer')->name('show.answer');
        Route::post('/get-answer-all', 'QuestionController@getAnswerAll')->name('get.answer.all');
        Route::post('/show/answe/ajax', 'QuestionController@showAnswerAjax')->name('show.answer.ajax');

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
        Route::get('/view/answer/{id}/{user_id}', 'QuestionController@viewAnswer')->name('view_answer');

        //maps
        Route::get('/show/maps/{id}', 'QuestionController@showMaps')->name('show.maps');
        Route::get('/all/maps/', 'QuestionController@showMapsAll')->name('show.maps.all');

        // Notification
        Route::get('/all/notfication/', 'QuestionController@NotifyController')->name('notify.all');

        Route::get('message/{id}', 'MessageController@index')->name('message');

        Route::get('message/box/{id}', 'MessageController@messageBox')->name('message.box');
        Route::post('status_update/{id}', 'MessageController@StatusUpdate')->name('status_update');

        Route::post('message/user2', 'MessageController@message2User')->name('message2.user');
        Route::get('unseenmessage', 'MessageController@unSeenMessage')->name('unseenmessage');
    });
});
