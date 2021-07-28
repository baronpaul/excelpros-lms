<?php

Route::group(['namespace' => 'Org'], function() {

    
    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('org.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('org.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('org.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('org.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('org.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('org.password.reset');


    Route::get('/', 'OrganizationHomeController@index')->name('org.home');

    Route::get('/course', [
        'uses' => 'OrganizationCoursesController@index',
        'as' => 'org.course.index'
    ]);

    Route::get('/course/detail/{id}', [
        'uses' => 'OrganizationCoursesController@detail',
        'as' => 'org.course.detail'
    ]);

    Route::get('/course/facilitator/{url}', [
        'uses' => 'OrganizationCoursesController@facilitator',
        'as' => 'org.course.facilitator'
    ]);

    Route::get('/participants', [
        'uses' => 'OrganizationParticipantsController@index',
        'as' => 'org.participants.index'
    ]);

    Route::get('/participants/detail/id', [
        'uses' => 'OrganizationParticipantsController@detail',
        'as' => 'org.participants.detail'
    ]);


    Route::get('/assessment', [
        'uses' => 'OrganizationAssessmentController@index',
        'as' => 'org.assessment.index'
    ]);

    Route::get('/assessment/detail/{id}', [
        'uses' => 'OrganizationAssessmentController@detail',
        'as' => 'org.assessment.detail'
    ]);

    Route::get('/assessment/participation_detail/{id}', [
        'uses' => 'OrganizationAssessmentController@participation_detail',
        'as' => 'org.assessment.participation_detail'
    ]);

    Route::get('/assessment/export_participation/{id}', [
        'uses' => 'OrganizationAssessmentController@export_participation',
        'as' => 'org.assessment.export_participation'
    ]);


    Route::get('/profile/index', [
        'uses' => 'OrganizationProfileController@index',
        'as' => 'org.profile.index'
    ]);

    Route::get('/profile/edit', [
        'uses' => 'OrganizationProfileController@edit',
        'as' => 'org.profile.edit'
    ]);

    Route::post('/profile/update', [
        'uses' => 'OrganizationProfileController@update',
        'as' => 'org.profile.update'
    ]);

    Route::get('/profile/change_password', [
        'uses' => 'OrganizationProfileController@change_password',
        'as' => 'org.profile.change_password'
    ]);

    Route::post('/profile/update_password', [
        'uses' => 'OrganizationProfileController@update_password',
        'as' => 'org.profile.update_password'
    ]);

});