<?php

if (env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}

Route::group(['namespace' => 'Facilitator'], function() {

    
    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('facilitator.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('facilitator.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('facilitator.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('facilitator.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('facilitator.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('facilitator.password.reset');


    Route::get('/', 'FacilitatorHomeController@index')->name('facilitator.home');

    Route::get('/courses', [
        'uses' => 'FacilitatorCoursesController@index',
        'as' => 'facilitator.courses.index'
    ]);

    Route::get('/courses/detail/{id}', [
        'uses' => 'FacilitatorCoursesController@detail',
        'as' => 'facilitator.courses.detail'
    ]);


    Route::get('/assessment', [
        'uses' => 'FacilitatorAssessmentController@index',
        'as' => 'facilitator.assessment.index'
    ]);

    Route::get('/assessment/detail/{id}', [
        'uses' => 'FacilitatorAssessmentController@detail',
        'as' => 'facilitator.assessment.detail'
    ]);

    Route::get('/assessment/participation_detail/{id}', [
        'uses' => 'FacilitatorAssessmentController@participation_detail',
        'as' => 'facilitator.assessment.participation_detail'
    ]);

    Route::get('/assessment/export_participation/{id}', [
        'uses' => 'FacilitatorAssessmentController@export_participation',
        'as' => 'facilitator.assessment.export_participation'
    ]);

    Route::get('/assessment/grade/{id}', [
        'uses' => 'FacilitatorAssessmentController@grade_participation',
        'as' => 'facilitator.assessment.grade'
    ]);

    Route::get('/assessment/submit_grade', [
        'uses' => 'FacilitatorAssessmentController@submit_grade',
        'as' => 'facilitator.assessment.submit_grade'
    ]);


    Route::get('/evaluations', [
        'uses' => 'FacilitatorEvaluationController@index',
        'as' => 'facilitator.evaluations.index'
    ]);

    Route::get('/evaluations/detail/{id}', [
        'uses' => 'FacilitatorEvaluationController@detail',
        'as' => 'facilitator.evaluations.detail'
    ]);

    Route::get('/evaluations/participant/{id}/{pid}', [
        'uses' => 'FacilitatorEvaluationController@participant',
        'as' => 'facilitator.evaluations.participant'
    ]);


    Route::get('/profile/index', [
        'uses' => 'FacilitatorProfileController@index',
        'as' => 'facilitator.profile.index'
    ]);

    Route::get('/profile/edit', [
        'uses' => 'FacilitatorProfileController@edit',
        'as' => 'facilitator.profile.edit'
    ]);

    Route::post('/profile/update', [
        'uses' => 'FacilitatorProfileController@update',
        'as' => 'facilitator.profile.update'
    ]);

    Route::get('/profile/change_password', [
        'uses' => 'FacilitatorProfileController@change_password',
        'as' => 'facilitator.profile.change_password'
    ]);

    Route::post('/profile/update_password', [
        'uses' => 'FacilitatorProfileController@update_password',
        'as' => 'facilitator.profile.update_password'
    ]);

    Route::get('/profile/change_profile_pic', [
        'uses' => 'FacilitatorProfileController@change_profile_pic',
        'as' => 'facilitator.profile.change_profile_pic'
    ]);

    Route::post('/profile/update_profile_pic', [
        'uses' => 'FacilitatorProfileController@update_profile_pic',
        'as' => 'facilitator.profile.update_profile_pic'
    ]);

});

