<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'frontend'], function () {
    Route::any('/', 'ApplicationController@index')->name('index');
    Route::any('/contact', 'ApplicationController@contact')->name('contact');
    Route::any('/about', 'ApplicationController@about')->name('about');
    Route::any('/login', 'ApplicationController@login')->name('login');
    Route::any('/register', 'ApplicationController@register')->name('register');
    Route::group(['prefix' => 'users', 'middleware' => 'auth:web'], function () {
        Route::any('/', 'ApplicationController@user')->name('users');
        Route::any('donorProfile/{id?}', 'ApplicationController@donorProfile')->name('donorProfile');
        Route::any('/user-logout', 'ApplicationController@logout')->name('user-logout');
        Route::any('services', 'ApplicationController@services')->name('services');
//        Route::any('/nearest', 'ApplicationController@nearest')->name('nearest');
        Route::get('/nearest', [App\Http\Controllers\Frontend\ApplicationController::class, 'nearest'])->name('nearest');
        Route::any('/profile', 'ApplicationController@profile')->name('profile');
        Route::any('/new-donor', 'ApplicationController@newDonor')->name('new-donor');
        Route::any('/login-donor', 'ApplicationController@loginDonor')->name('login-donor');
        //        edit blood user
        Route::any('edit-blood-user/{id?}', 'ApplicationController@editBlood')->name('edit-blood-user');
        Route::any('edit-blood-user-action', 'ApplicationController@editBloodAction')->name('edit-blood-user-action');
        //------------- update donors status on users page-----------------
        Route::any('/update-donor-status', 'ApplicationController@updateDonorStatus')->name('update-donor-status');
        Route::any('/show-blood-request', 'ApplicationController@showBloodRequest')->name('show-blood-request');
        Route::any('/add-blood-request', 'ApplicationController@addBloodRequest')->name('add-blood-request');


        Route::any('/decision', 'ApplicationController@decision')->name('decision');
        // Route::any('/decisionStatus/{criteria?}', 'ApplicationController@decisionStatus')->name('decisionStatus');
        Route::any('/sendSeekerEmail/{criteria?}', 'ApplicationController@sendSeekerEmail')->name('sendSeekerEmail');


        // ==================email-send====================================


        Route::any('/sendEmail', 'ApplicationController@sendEmail')->name('sendEmail');




    });
    Route::any('/questionnaire', 'QuestionnaireController@questionnaire')->name('questionnaire');
    Route::group(['prefix' => 'donor', 'middleware' => 'auth:questionnaire'], function () {
        Route::any('/add-donor', 'QuestionnaireController@addDonor')->name('add-donor');
        Route::any('/show-donor', 'QuestionnaireController@showDonor')->name('show-donor');
        //        --------------delete from donor admin user profile
//                 Route::any('delete-donor-profile/{criteria?}', 'QuestionnaireController@deleteDonorProfile')->name('delete-donor-profile');
        Route::any('logout', 'QuestionnaireController@logout')->name('logout');
    });
});


Route::group(['namespace' => 'backend'], function () {
    Route::any('admin-login', 'AdminUserController@login')->name('admin-login');
});

Route::group(['namespace' => 'backend', 'prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::any('/', 'DashboardController@index')->name('admin');
    Route::group(['prefix' => 'admin-users'], function () {
        Route::any('/', 'AdminUserController@index')->name('show-admin-users');
        Route::any('/add-admin-user', 'AdminUserController@add')->name('add-admin-user');
        Route::any('/show-blood-user', 'AdminUserController@showBloodUser')->name('show-blood-user');
        Route::any('delete-blood-user/{criteria?}', 'AdminUserController@deleteBloodUser')->name('delete-blood-user');
        Route::any('delete-questionnaire-user/{criteria?}', 'AdminUserController@deleteQuestionnaireUser')->name('delete-questionnaire-user');
        Route::any('delete-newDonor-user/{criteria?}', 'AdminUserController@deleteNewDonorUser')->name('delete-newDonor-user');
        Route::any('delete-donor-user/{criteria?}', 'AdminUserController@deleteDonorUser')->name('delete-donor-user');
        Route::any('add-blood-bank', 'AdminUserController@addBloodBank')->name('add-blood-bank');
        Route::any('show-blood-bank', 'AdminUserController@showBloodBank')->name('show-blood-bank');
        Route::any('update-bloodUser-status', 'AdminUserController@updateUserStatus')->name('update-bloodUser-status');
        Route::any('update-donorAdmin-status', 'AdminUserController@updateDonorAdminStatus')->name('update-donorAdmin-status');
        Route::any('/show-questionnaire', 'AdminUserController@questionnaire')->name('show-questionnaire');
        Route::any('/update-questionnaire-status', 'AdminUserController@updateQuestionnaireStatus')->name('update-questionnaire-status');
        Route::any('/show-donor-admin', 'AdminUserController@showDonorAdmin')->name('show-donor-admin');
        Route::any('/show-newDonor', 'AdminUserController@showNewDonor')->name('show-newDonor');
        Route::any('update-user-status', 'AdminUserController@updateStatus')->name('update-user-status');
        Route::any('update-user-type', 'AdminUserController@updateType')->name('update-user-type');
        Route::any('delete-admin-user/{criteria?}', 'AdminUserController@delete')->name('delete-admin-user');
        Route::any('edit-admin-user/{id?}', 'AdminUserController@edit')->name('edit-admin-user');
        Route::any('edit-admin-user-action', 'AdminUserController@editAction')->name('edit-admin-user-action');
    });
    Route::any('admin-logout', 'AdminUserController@logout')->name('admin-logout');
});
