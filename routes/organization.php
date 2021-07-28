<?php

if (env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}

Route::group(['namespace' => 'Organization'], function() {

    

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('organization.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('organization.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('organization.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('organization.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('organization.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('organization.password.reset');

    Route::get('/', 'OrganizationHomeController@index')->name('organization.dashboard');

    Route::get('/home', 'OrganizationHomeController@index')->name('organization.home');

    Route::get('/course', [
        'uses' => 'OrganizationCoursesController@index',
        'as' => 'organization.courses.index'
    ]);

    Route::get('/course/detail/{id}', [
        'uses' => 'OrganizationCoursesController@detail',
        'as' => 'organization.courses.detail'
    ]);

    Route::get('/course/facilitator/{url}', [
        'uses' => 'OrganizationCoursesController@facilitator',
        'as' => 'organization.courses.facilitator'
    ]);

    Route::get('/participants', [
        'uses' => 'OrganizationParticipantsController@index',
        'as' => 'organization.participants.index'
    ]);

    Route::get('/participants/detail/{id}', [
        'uses' => 'OrganizationParticipantsController@detail',
        'as' => 'organization.participants.detail'
    ]);


    Route::get('/assessment', [
        'uses' => 'OrganizationAssessmentController@index',
        'as' => 'organization.assessment.index'
    ]);

    Route::get('/assessment/detail/{id}', [
        'uses' => 'OrganizationAssessmentController@detail',
        'as' => 'organization.assessment.detail'
    ]);

    Route::get('/assessment/questions/{id}', [
        'uses' => 'OrganizationAssessmentController@questions',
        'as' => 'organization.assessment.questions'
    ]);

    Route::get('/assessment/participation_detail/{id}', [
        'uses' => 'OrganizationAssessmentController@participation_detail',
        'as' => 'organization.assessment.participation_detail'
    ]);

    Route::get('/assessment/export_participation/{id}', [
        'uses' => 'OrganizationAssessmentController@export_participation',
        'as' => 'organization.assessment.export_participation'
    ]);


    Route::get('/profile', [
        'uses' => 'OrganizationProfileController@index',
        'as' => 'organization.profile'
    ]);

    Route::get('/profile/edit', [
        'uses' => 'OrganizationProfileController@edit',
        'as' => 'organization.profile.edit'
    ]);

    Route::post('/profile/update', [
        'uses' => 'OrganizationProfileController@update',
        'as' => 'organization.profile.update'
    ]);

    Route::get('/profile/change_password', [
        'uses' => 'OrganizationProfileController@change_password',
        'as' => 'organization.profile.change_password'
    ]);

    Route::post('/profile/update_password', [
        'uses' => 'OrganizationProfileController@update_password',
        'as' => 'organization.profile.update_password'
    ]);

});