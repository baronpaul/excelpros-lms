<?php

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

if (env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}

Route::get('/', [
	'uses' => 'HomeController@index',
	'as' => 'home'
]);

Route::get('/home', [
	'uses' => 'HomeController@index',
	'as' => 'home'
]);


Route::get('404',['as'=>'404','uses'=>'ErrorHandlerController@errorCode404']);

Route::get('405',['as'=>'405','uses'=>'ErrorHandlerController@errorCode405']);

Route::get('500',['as'=>'500','uses'=>'ErrorHandlerController@errorCode500']);

//Clear Cache facade value:
/*
	Route::get('/clear-cache', function() {
		$exitCode = Artisan::call('cache:clear');
		return '<h1>Cache facade value cleared</h1>';
	});

	Route::get('/optimize', function() {
		$exitCode = Artisan::call('optimize');
		return '<h1>Reoptimized class loader</h1>';
	});

	Route::get('/route-cache', function() {
		$exitCode = Artisan::call('route:cache');
		return '<h1>Routes cached</h1>';
	});

	Route::get('/route-clear', function() {
		$exitCode = Artisan::call('route:clear');
		return '<h1>Route cache cleared</h1>';
	});

	Route::get('/view-clear', function() {
		$exitCode = Artisan::call('view:clear');
		return '<h1>View cache cleared</h1>';
	});

	Route::get('/config-cache', function() {
		$exitCode = Artisan::call('config:cache');
		return '<h1>Clear Config cleared</h1>';
	});
*/


Auth::routes();

Route::group(['middleware' => 'auth'], function() {


	Route::get('/profile', [
		'uses' => 'UserProfileController@index',
		'as' => 'profile.index'
	]);

	Route::get('/profile/edit', [
		'uses' => 'UserProfileController@edit',
		'as' => 'profile.edit'
	]);

	Route::post('/profile/update', [
		'uses' => 'UserProfileController@update',
		'as' => 'profile.update'
	]);

	Route::get('/profile/profile_pic', [
		'uses' => 'UserProfileController@profile_pic',
		'as' => 'profile.profile_pic'
	]);

	Route::post('/profile/update_profile_pic', [
		'uses' => 'UserProfileController@update_profile_pic',
		'as' => 'profile.update_profile_pic'
	]);

	Route::get('/profile/change_password', [
		'uses' => 'UserProfileController@change_password',
		'as' => 'profile.change_password'
	]);

	Route::post('/profile/do_change_password', [
		'uses' => 'UserProfileController@do_change_password',
		'as' => 'profile.do_change_password'
	]);

	
	Route::get('/evaluations', [
		'uses' => 'EvaluationsController@index',
		'as' => 'evaluations.index'
	]);

	Route::get('/evaluations/facilitators', [
		'uses' => 'EvaluationsController@facilitators',
		'as' => 'evaluations.facilitators'
	]);
	
	Route::get('/evaluations/facilitator_evaluation/{url}', [
		'uses' => 'EvaluationsController@facilitator_evaluation',
		'as' => 'evaluations.facilitator_evaluation'
	]);

	Route::post('/evaluations/store_facilitator_evaluation', [
		'uses' => 'EvaluationsController@store_facilitator_evaluation',
		'as' => 'evaluations.store_facilitator_evaluation'
	]);

	Route::get('/evaluations/facilitator_evaluation_thanks', [
		'uses' => 'EvaluationsController@facilitator_evaluation_thanks',
		'as' => 'evaluations.facilitator_evaluation_thanks'
	]);


	Route::get('/evaluations/program_evaluation', [
		'uses' => 'EvaluationsController@program_evaluation',
		'as' => 'evaluations.program'
	]);

	Route::post('/evaluations/store_program_evaluation', [
		'uses' => 'EvaluationsController@store_program_evaluation',
		'as' => 'evaluations.store_program_evaluation'
	]);

	Route::get('/evaluations/program_evaluation_thanks', [
		'uses' => 'EvaluationsController@program_evaluation_thanks',
		'as' => 'evaluations.program_evaluation_thanks'
	]);


	//courses routes
	Route::get('/courses', [
		'uses' => 'CoursesController@index',
		'as' => 'courses.index'
	]);

	Route::get('/course/materials', [
		'uses' => 'CoursesController@materials',
		'as' => 'courses.materials'
	]);

	Route::get('/course/detail/{url}', [
		'uses' => 'CoursesController@detail',
		'as' => 'courses.detail'
	]);

	Route::get('/course/facilitator/{url}', [
		'uses' => 'CoursesController@facilitator',
		'as' => 'courses.facilitator'
	]);

	Route::get('/course/assignment/{slug}', [
		'uses' => 'CoursesController@assignment',
		'as' => 'courses.assignment'
	]);

	Route::get('/course/submit_assignment/{slug}', [
		'uses' => 'CoursesController@submit_assignment',
		'as' => 'courses.submit_assignment'
	]);

	Route::post('/course/do_submit_assignment/{slug}', [
		'uses' => 'CoursesController@do_submit_assignment',
		'as' => 'courses.do_submit_assignment'
	]);

	


	Route::get('/test', [
		'uses' => 'ExamController@index',
		'as' => 'test.index'
	]);

	Route::get('/test/intro/{url}', [
		'uses' => 'ExamController@test_intro',
		'as' => 'test.intro'
	]);

	Route::get('/test/begin/{url}', [
		'uses' => 'ExamController@take_test',
		'as' => 'test.begin'
	]);

	Route::post('/test/submit_test', [
		'uses' => 'ExamController@submit_test',
		'as' => 'test.submit_test'
	]);

	Route::post('/test/submit_essay_test', [
		'uses' => 'ExamController@submit_essay_test',
		'as' => 'test.submit_essay_test'
	]);

	Route::get('/test/completed/{id}', [
		'uses' => 'ExamController@test_completed',
		'as' => 'test.completed'
	]);


});

