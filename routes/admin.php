<?php

if (env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}

Route::group(['namespace' => 'Admin'], function() {

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
    
    Route::post('/course_modules/store', [
        'uses' => 'AdminCoursesController@store',
        'as' => 'admin.courses.store'
    ]);

    Route::get('/course_modules', [
        'uses' => 'AdminCoursesController@index',
        'as' => 'admin.courses.index'
    ]);

    Route::get('/course_modules/create/{id}', [
        'uses' => 'AdminCoursesController@create',
        'as' => 'admin.courses.create'
    ]);


    Route::get('/', 'AdminHomeController@index')->name('admin.home');

    Route::get('/home', [
        'uses' => 'AdminHomeController@index',
        'as' => 'admin.home'
    ]);
    

    Route::get('/organizations', [
        'uses' => 'AdminOrganizationsController@index',
        'as' => 'admin.organizations.index'
    ]);

    Route::get('/organizations/create', [
        'uses' => 'AdminOrganizationsController@create',
        'as' => 'admin.organizations.create'
    ]);

    Route::post('/organizations/store', [
        'uses' => 'AdminOrganizationsController@store',
        'as' => 'admin.organizations.store'
    ]);

    Route::get('/organizations/edit/{id}', [
        'uses' => 'AdminOrganizationsController@edit',
        'as' => 'admin.organizations.edit'
    ]);

    Route::post('/organizations/update', [
        'uses' => 'AdminOrganizationsController@update',
        'as' => 'admin.organizations.update'
    ]);

    Route::get('/organizations/change_password/{id}', [
        'uses' => 'AdminOrganizationsController@change_password',
        'as' => 'admin.organizations.change_password'
    ]);

    Route::post('/organizations/update_password', [
        'uses' => 'AdminOrganizationsController@update_password',
        'as' => 'admin.organizations.update_password'
    ]);

    Route::get('/organizations/change_logo/{id}', [
        'uses' => 'AdminOrganizationsController@change_logo',
        'as' => 'admin.organizations.change_logo'
    ]);

    Route::post('/organizations/update_logo', [
        'uses' => 'AdminOrganizationsController@update_logo',
        'as' => 'admin.organizations.update_logo'
    ]);

    Route::get('/organizations/detail/{id}', [
        'uses' => 'AdminOrganizationsController@detail',
        'as' => 'admin.organizations.detail'
    ]);

    Route::get('/organizations/delete/{id}', [
        'uses' => 'AdminOrganizationsController@delete',
        'as' => 'admin.organizations.delete'
    ]);

    Route::post('/organizations/destroy', [
        'uses' => 'AdminOrganizationsController@destroy',
        'as' => 'admin.organizations.destroy'
    ]);


    
    Route::get('/courses', [
        'uses' => 'AdminProgramsController@index',
        'as' => 'admin.training_programs.index'
    ]);

    Route::get('/courses/create', [
        'uses' => 'AdminProgramsController@create',
        'as' => 'admin.training_programs.create'
    ]);

    Route::post('/courses/store', [
        'uses' => 'AdminProgramsController@store',
        'as' => 'admin.training_programs.store'
    ]);

    Route::get('/courses/detail/{id}', [
        'uses' => 'AdminProgramsController@detail',
        'as' => 'admin.training_programs.detail'
    ]);

    Route::get('/courses/edit/{id}', [
        'uses' => 'AdminProgramsController@edit',
        'as' => 'admin.training_programs.edit'
    ]);

    Route::post('/courses/update', [
        'uses' => 'AdminProgramsController@update',
        'as' => 'admin.training_programs.update'
    ]);

    Route::get('/courses/participants/{id}', [
        'uses' => 'AdminProgramsController@participants',
        'as' => 'admin.training_programs.participants'
    ]);

    Route::get('/courses/add_course_material/{id}', [
        'uses' => 'AdminProgramsController@add_course_material',
        'as' => 'admin.training_programs.add_course_material'
    ]);

    Route::post('/courses/store_course_material', [
        'uses' => 'AdminProgramsController@store_course_material',
        'as' => 'admin.training_programs.store_course_material'
    ]);

    Route::get('/courses/view_course_material/{id}', [
        'uses' => 'AdminProgramsController@view_course_material',
        'as' => 'admin.training_programs.view_course_material'
    ]);

    Route::get('/courses/edit_course_material/{id}', [
        'uses' => 'AdminProgramsController@edit_course_material',
        'as' => 'admin.training_programs.edit_course_material'
    ]);

    Route::post('/courses/update_course_material', [
        'uses' => 'AdminProgramsController@update_course_material',
        'as' => 'admin.training_programs.update_course_material'
    ]);

    Route::get('/courses/delete_course_material/{id}', [
        'uses' => 'AdminProgramsController@delete_course_material',
        'as' => 'admin.training_programs.delete_course_material'
    ]);

    Route::post('/courses/remove_course_material', [
        'uses' => 'AdminProgramsController@remove_course_material',
        'as' => 'admin.training_programs.remove_course_material'
    ]);

    Route::get('/courses/end_training/{id}', [
        'uses' => 'AdminProgramsController@end_training',
        'as' => 'admin.training_programs.end_training'
    ]);

    Route::post('/courses/do_end_training', [
        'uses' => 'AdminProgramsController@do_end_training',
        'as' => 'admin.training_programs.do_end_training'
    ]);

    
    Route::get('/courses/delete/{id}', [
        'uses' => 'AdminProgramsController@delete',
        'as' => 'admin.training_programs.delete'
    ]);

    Route::post('/courses/destroy', [
        'uses' => 'AdminProgramsController@destroy',
        'as' => 'admin.training_programs.destroy'
    ]);

    Route::get('/course_modules/detail/{id}', [
        'uses' => 'AdminCoursesController@detail',
        'as' => 'admin.courses.detail'
    ]);

    Route::get('/course_modules/edit/{id}', [
        'uses' => 'AdminCoursesController@edit',
        'as' => 'admin.courses.edit'
    ]);

    Route::post('/course_modules/update', [
        'uses' => 'AdminCoursesController@update',
        'as' => 'admin.courses.update'
    ]);

    Route::get('/course_modules/add_course_materials/{id}', [
        'uses' => 'AdminCoursesController@add_course_materials',
        'as' => 'admin.courses.add_course_materials'
    ]);

    Route::post('/course_modules/store_course_materials', [
        'uses' => 'AdminCoursesController@store_course_materials',
        'as' => 'admin.courses.store_course_materials'
    ]);

    Route::get('/course_modules/delete/{id}', [
        'uses' => 'AdminCoursesController@delete',
        'as' => 'admin.courses.delete'
    ]);

    Route::post('/course_modules/destroy', [
        'uses' => 'AdminCoursesController@destroy',
        'as' => 'admin.courses.destroy'
    ]);


    Route::get('/assignments/create/{id}', [
        'uses' => 'AdminAssignmentsController@create',
        'as' => 'admin.assignments.create'
    ]);

    Route::post('/assignments/store', [
        'uses' => 'AdminAssignmentsController@store',
        'as' => 'admin.assignments.store'
    ]);

    Route::get('/assignments/detail/{id}', [
        'uses' => 'AdminAssignmentsController@detail',
        'as' => 'admin.assignments.detail'
    ]);

    Route::get('/assignments/edit/{id}', [
        'uses' => 'AdminAssignmentsController@edit',
        'as' => 'admin.assignments.edit'
    ]);

    Route::post('/assignments/update', [
        'uses' => 'AdminAssignmentsController@update',
        'as' => 'admin.assignments.update'
    ]);

    Route::get('/assignments/delete/{id}', [
        'uses' => 'AdminAssignmentsController@delete',
        'as' => 'admin.assignments.delete'
    ]);

    Route::get('/assignments/destroy', [
        'uses' => 'AdminAssignmentsController@destroy',
        'as' => 'admin.assignments.destroy'
    ]);




    Route::get('/evaluations', [
        'uses' => 'AdminEvaluationsController@index',
        'as' => 'admin.evaluations.index'
    ]);

    Route::get('/evaluations/program_evaluation/{id}', [
        'uses' => 'AdminEvaluationsController@program_evaluation',
        'as' => 'admin.evaluations.program_evaluation'
    ]);

    Route::get('/evaluations/program_evaluation_detail/{id}', [
        'uses' => 'AdminEvaluationsController@program_evaluation_detail',
        'as' => 'admin.evaluations.program_evaluation_detail'
    ]);

    Route::get('/evaluations/export_program_evaluation/{id}', [
        'uses' => 'AdminEvaluationsController@export_program_evaluation',
        'as' => 'admin.evaluations.export_program_evaluation'
    ]);

    Route::get('/evaluations/facilitator_evaluations/{id}', [
        'uses' => 'AdminEvaluationsController@facilitator_evaluations',
        'as' => 'admin.evaluations.facilitator_evaluations'
    ]);

    Route::get('/evaluations/facilitator_evaluation_detail/{id}/{fac_id}', [
        'uses' => 'AdminEvaluationsController@facilitator_evaluation_detail',
        'as' => 'admin.evaluations.facilitator_evaluation_detail'
    ]);

    Route::get('/evaluations/export_facilitator_evaluation/{id}/{fac_id}', [
        'uses' => 'AdminEvaluationsController@export_facilitator_evaluation',
        'as' => 'admin.evaluations.export_facilitator_evaluation'
    ]);

    Route::get('/evaluations/participant_facilitator_evaluation/{id}/{user_id}', [
        'uses' => 'AdminEvaluationsController@participant_facilitator_evaluation',
        'as' => 'admin.evaluations.participant_facilitator_evaluation'
    ]); 



    //certificates routes
    Route::get('/certificates', [
        'uses' => 'AdminCertificatesController@index',
        'as' => 'admin.certificates.index'
    ]);

    Route::get('/certificates/create', [
        'uses' => 'AdminCertificatesController@create',
        'as' => 'admin.certificates.create'
    ]);

    Route::post('/certificates/store', [
        'uses' => 'AdminCertificatesController@store',
        'as' => 'admin.certificates.store'
    ]);

    Route::get('/certificates/detail/{id}', [
        'uses' => 'AdminCertificatesController@detail',
        'as' => 'admin.certificates.detail'
    ]);

    Route::get('/certificates/edit/{id}', [
        'uses' => 'AdminCertificatesController@edit',
        'as' => 'admin.certificates.edit'
    ]);

    Route::post('/certificates/update', [
        'uses' => 'AdminCertificatesController@update',
        'as' => 'admin.certificates.update'
    ]);

    Route::get('/certificates/delete/{id}', [
        'uses' => 'AdminCertificatesController@delete',
        'as' => 'admin.certificates.delete'
    ]);

    Route::post('/certificates/destroy', [
        'uses' => 'AdminCertificatesController@destroy',
        'as' => 'admin.certificates.destroy'
    ]);

    Route::get('/certificates/get_trainings', [
        'uses' => 'AdminCertificatesController@get_trainings',
        'as' => 'admin.certificates.get_trainings'
    ]);



    //users routes
    Route::get('/users/', [
        'uses' => 'AdminUsersController@index',
        'as' => 'admin.users.index'
    ]);

    Route::get('/users/participants/{id}', [
        'uses' => 'AdminUsersController@participants',
        'as' => 'admin.users.participants'
    ]);

    Route::get('/users/view/{id}', [
        'uses' => 'AdminUsersController@view',
        'as' => 'admin.users.view'
    ]);

    Route::get('/users/create', [
        'uses' => 'AdminUsersController@create',
        'as' => 'admin.users.create'
    ]);

    Route::post('/users/store', [
        'uses' => 'AdminUsersController@store',
        'as' => 'admin.users.store'
    ]);

    Route::get('/users/edit/{id}', [
        'uses' => 'AdminUsersController@edit',
        'as' => 'admin.users.edit'
    ]);

    Route::post('/users/update', [
        'uses' => 'AdminUsersController@update',
        'as' => 'admin.users.update'
    ]);

    Route::get('/users/upload_users', [
        'uses' => 'AdminUsersController@upload_users',
        'as' => 'admin.users.upload_users'
    ]);

    Route::post('/users/do_upload_users', [
        'uses' => 'AdminUsersController@do_upload_users',
        'as' => 'admin.users.do_upload_users'
    ]);

    Route::get('/users/certificates/{id}', [
        'uses' => 'AdminUsersController@certificates',
        'as' => 'admin.users.certificates'
    ]);

    Route::post('/users/issue_certificate', [
        'uses' => 'AdminUsersController@issue_certificate',
        'as' => 'admin.users.issue_certificate'
    ]);

    Route::get('/users/download_certificate/{id}', [
        'uses' => 'AdminUsersController@download_certificate',
        'as' => 'admin.users.download_certificate'
    ]);

    Route::get('/users/send_certificate/{id}', [
        'uses' => 'AdminUsersController@send_certificate',
        'as' => 'admin.users.send_certificate'
    ]);

    Route::get('/users/change_status/{id}', [
        'uses' => 'AdminUsersController@change_status',
        'as' => 'admin.users.change_status'
    ]);

    Route::post('/users/update_status', [
        'uses' => 'AdminUsersController@update_status',
        'as' => 'admin.users.update_status'
    ]);

    Route::get('/users/change_password/{id}', [
        'uses' => 'AdminUsersController@change_password',
        'as' => 'admin.users.change_password'
    ]);

    Route::post('/users/update_password', [
        'uses' => 'AdminUsersController@update_password',
        'as' => 'admin.users.update_password'
    ]);

    Route::get('/users/edit_picture/{id}', [
        'uses' => 'AdminUsersController@edit_picture',
        'as' => 'admin.users.edit_picture'
    ]);

    Route::post('/users/update_picture', [
        'uses' => 'AdminUsersController@update_picture',
        'as' => 'admin.users.update_picture'
    ]);

    Route::get('/users/suspend/{id}', [
        'uses' => 'AdminUsersController@suspend',
        'as' => 'admin.users.suspend'
    ]);

    Route::post('/users/do_suspend', [
        'uses' => 'AdminUsersController@do_suspend',
        'as' => 'admin.users.do_suspend'
    ]);

    Route::get('/users/export_excel', [
        'uses' => 'AdminUsersController@export_excel',
        'as' => 'admin.users.export_excel'
    ]);

    Route::get('/users/delete/{id}', [
        'uses' => 'AdminUsersController@delete',
        'as' => 'admin.users.delete'
    ]);

    Route::post('/users/destroy', [
        'uses' => 'AdminUsersController@destroy',
        'as' => 'admin.users.destroy'
    ]);


    
    //facilitators routes
    Route::get('/facilitators', [
        'uses' => 'AdminFacilitatorsController@index',
        'as' => 'admin.facilitators.index'
    ]);

    Route::get('/facilitators/detail/{id}', [
        'uses' => 'AdminFacilitatorsController@detail',
        'as' => 'admin.facilitators.detail'
    ]);

    Route::get('/facilitators/create/', [
        'uses' => 'AdminFacilitatorsController@create',
        'as' => 'admin.facilitators.create'
    ]);

    Route::post('/facilitators/store/', [
        'uses' => 'AdminFacilitatorsController@store',
        'as' => 'admin.facilitators.store'
    ]);

    Route::get('/facilitators/upload_facilitators', [
        'uses' => 'AdminFacilitatorsController@upload_facilitators',
        'as' => 'admin.facilitators.upload_facilitators'
    ]);

    Route::post('/facilitators/do_upload_facilitators', [
        'uses' => 'AdminFacilitatorsController@do_upload_facilitators',
        'as' => 'admin.facilitators.do_upload_facilitators'
    ]);

    Route::get('/facilitators/activate/{id}', [
        'uses' => 'AdminFacilitatorsController@activate',
        'as' => 'admin.facilitators.activate'
    ]);

    Route::post('/facilitators/do_activate', [
        'uses' => 'AdminFacilitatorsController@do_activate',
        'as' => 'admin.facilitators.do_activate'
    ]);

    Route::get('/facilitators/edit/{id}', [
        'uses' => 'AdminFacilitatorsController@edit',
        'as' => 'admin.facilitators.edit'
    ]);

    Route::post('/facilitators/update', [
        'uses' => 'AdminFacilitatorsController@update',
        'as' => 'admin.facilitators.update'
    ]);

    Route::get('/facilitators/change_password/{id}', [
        'uses' => 'AdminFacilitatorsController@change_password',
        'as' => 'admin.facilitators.change_password'
    ]);

    Route::post('/facilitators/update_password', [
        'uses' => 'AdminFacilitatorsController@update_password',
        'as' => 'admin.facilitators.update_password'
    ]);

    Route::get('/facilitators/change_picture/{id}', [
        'uses' => 'AdminFacilitatorsController@change_picture',
        'as' => 'admin.facilitators.change_picture'
    ]);

    Route::post('/facilitators/update_picture', [
        'uses' => 'AdminFacilitatorsController@update_picture',
        'as' => 'admin.facilitators.update_picture'
    ]);

    Route::get('/facilitators/delete/{id}', [
        'uses' => 'AdminFacilitatorsController@delete',
        'as' => 'admin.facilitators.delete'
    ]);

    Route::post('/facilitators/destroy', [
        'uses' => 'AdminFacilitatorsController@destroy',
        'as' => 'admin.facilitators.destroy'
    ]);

    


    //collections routes
    Route::get('/collections', [
        'uses' => 'AdminCollectionsController@index',
        'as' => 'admin.collections.index'
    ]);

    Route::get('/collections/create', [
        'uses' => 'AdminCollectionsController@create',
        'as' => 'admin.collections.create'
    ]);

    Route::post('/collections/store', [
        'uses' => 'AdminCollectionsController@store',
        'as' => 'admin.collections.store'
    ]);

    Route::get('/collections/edit/{id}', [
        'uses' => 'AdminCollectionsController@edit',
        'as' => 'admin.collections.edit'
    ]);

    Route::get('/collections/view/{id}', [
        'uses' => 'AdminCollectionsController@view',
        'as' => 'admin.collections.view'
    ]);

    Route::post('/collections/update/{id}', [
        'uses' => 'AdminCollectionsController@update',
        'as' => 'admin.collections.update'
    ]);

    Route::get('/collections/delete/{id}', [
        'uses' => 'AdminCollectionsController@delete',
        'as' => 'admin.collections.delete'
    ]);

    Route::post('/collections/destroy/{id}', [
        'uses' => 'AdminCollectionsController@destroy',
        'as' => 'admin.collections.destroy'
    ]);



    //questions routes
    Route::get('/questions', [
        'uses' => 'AdminQuestionsController@index',
        'as' => 'admin.questions.index'
    ]);

    Route::get('/questions/collection/{id}', [
        'uses' => 'AdminQuestionsController@collection',
        'as' => 'admin.questions.collection'
    ]);

    Route::get('/questions/view/{id}', [
        'uses' => 'AdminQuestionsController@view',
        'as' => 'admin.questions.view'
    ]);

    Route::get('/questions/create/{id}', [
        'uses' => 'AdminQuestionsController@create',
        'as' => 'admin.questions.create'
    ]);

    Route::post('/questions/store', [
        'uses' => 'AdminQuestionsController@store',
        'as' => 'admin.questions.store'
    ]);

    Route::get('/questions/edit/{id}', [
        'uses' => 'AdminQuestionsController@edit',
        'as' => 'admin.questions.edit'
    ]);

    Route::post('/questions/update', [
        'uses' => 'AdminQuestionsController@update',
        'as' => 'admin.questions.update'
    ]);

    Route::get('/questions/delete/{id}', [
        'uses' => 'AdminQuestionsController@delete',
        'as' => 'admin.questions.delete'
    ]);

    Route::get('/questions/destroy/{id}', [
        'uses' => 'AdminQuestionsController@destroy',
        'as' => 'admin.questions.destroy'
    ]);




    //exams routes
    Route::get('/exams', [
        'uses' => 'AdminExamController@index',
        'as' => 'admin.exams.index'
    ]);

    Route::get('/exams/active', [
        'uses' => 'AdminExamController@active',
        'as' => 'admin.exams.active'
    ]);

    Route::get('/exams/completed', [
        'uses' => 'AdminExamController@completed',
        'as' => 'admin.exams.completed'
    ]);

    Route::get('/exams/inactive', [
        'uses' => 'AdminExamController@inactive',
        'as' => 'admin.exams.inactive'
    ]);

    Route::get('/exams/filter_exam', [
        'uses' => 'AdminExamController@filterExam',
        'as' => 'admin.exams.filter_exam'
    ]);

    Route::get('/exams/select', [
        'uses' => 'AdminExamController@selectProgram',
        'as' => 'admin.exams.select'
    ]);

    Route::get('/exams/create/{id}', [
        'uses' => 'AdminExamController@create',
        'as' => 'admin.exams.create'
    ]);

    Route::post('/exams/store', [
        'uses' => 'AdminExamController@store',
        'as' => 'admin.exams.store'
    ]);

    Route::get('/exams/edit/{id}', [
        'uses' => 'AdminExamController@edit',
        'as' => 'admin.exams.edit'
    ]);

    Route::post('/exams/update/', [
        'uses' => 'AdminExamController@update',
        'as' => 'admin.exams.update'
    ]);

    Route::get('/exams/delete/{id}', [
        'uses' => 'AdminExamController@delete',
        'as' => 'admin.exams.delete'
    ]);

    Route::post('/exams/destroy', [
        'uses' => 'AdminExamController@destroy',
        'as' => 'admin.exams.destroy'
    ]);

    Route::get('/exams/add_participants/{id}', [
        'uses' => 'AdminExamController@add_participants',
        'as' => 'admin.exams.add_participants'
    ]);

    Route::post('/exams/do_add_participants/{id}', [
        'uses' => 'AdminExamController@do_add_participants',
        'as' => 'admin.exams.do_add_participants'
    ]);

    Route::post('/exams/remove_participants/{id}', [
        'uses' => 'AdminExamController@remove_participants',
        'as' => 'admin.exams.remove_participants'
    ]);

    Route::get('/exams/view/{id}', [
        'uses' => 'AdminExamController@view',
        'as' => 'admin.exams.view'
    ]);

    Route::get('/exams/view_questions/{id}', [
        'uses' => 'AdminExamController@view_questions',
        'as' => 'admin.exams.view_questions'
    ]);

    Route::get('/exams/view_participation/{id}', [
        'uses' => 'AdminExamController@view_participation',
        'as' => 'admin.exams.view_participation'
    ]);

    Route::post('/exams/filtered_view/{id}', [
        'uses' => 'AdminExamController@filtered_view',
        'as' => 'admin.exams.filtered_view'
    ]);

    Route::get('/exams/clear_participation_filter/{id}', [
        'uses' => 'AdminExamController@clear_filtered_view',
        'as' => 'admin.exams.clear_filtered_view'
    ]);

    Route::get('/exams/export_filtered/{id}', [
        'uses' => 'AdminExamController@export_filtered',
        'as' => 'admin.exams.export_filtered'
    ]);

    Route::get('/participations/detail/{id}', [
        'uses' => 'AdminExamController@view_participation_detail',
        'as' => 'admin.participations.detail'
    ]);

    Route::get('/participations/grade/{id}', [
        'uses' => 'AdminExamController@grade_participation',
        'as' => 'admin.participations.grade'
    ]);

    Route::post('/participations/submit_grade', [
        'uses' => 'AdminExamController@submit_grade',
        'as' => 'admin.participations.submit_grade'
    ]);

    Route::get('/participations/export_participation_detail/{id}', [
        'uses' => 'AdminExamController@export_participation_detail',
        'as' => 'admin.participations.export_detail'
    ]);

    Route::get('/participations/delete/{id}', [
        'uses' => 'AdminExamController@delete_participation',
        'as' => 'admin.participations.delete_participation'
    ]);

    Route::post('/participations/destroy/{id}', [
        'uses' => 'AdminExamController@destroy_participation',
        'as' => 'admin.participations.destroy_participation'
    ]);

    

    Route::get('/participations/', [
        'uses' => 'AdminParticipationController@index',
        'as' => 'admin.participations.index'
    ]);

    Route::post('/participations/filtered', [
        'uses' => 'AdminParticipationController@filtered',
        'as' => 'admin.participations.filtered'
    ]);

    Route::get('/participations/export', [
        'uses' => 'AdminParticipationController@export',
        'as' => 'admin.participations.export'
    ]);

    Route::get('/participations/export_filtered', [
        'uses' => 'AdminParticipationController@export_filtered',
        'as' => 'admin.participations.export_filtered'
    ]);

    Route::post('/participations/update/{id}', [
        'uses' => 'AdminParticipationController@update',
        'as' => 'admin.participations.update'
    ]);



    //portal admins routes
    Route::get('/portal_admins/', [
        'uses' => 'PortalAdminController@index',
        'as' => 'admin.portal_admins.index'
    ]);

    Route::get('/portal_admins/detail/{id}', [
        'uses' => 'PortalAdminController@detail',
        'as' => 'admin.portal_admins.detail'
    ]);

    Route::get('/portal_admins/create/', [
        'uses' => 'PortalAdminController@create',
        'as' => 'admin.portal_admins.create'
    ]);

    Route::post('/portal_admins/store/', [
        'uses' => 'PortalAdminController@store',
        'as' => 'admin.portal_admins.store'
    ]);

    Route::get('/portal_admins/edit/{id}', [
        'uses' => 'PortalAdminController@edit',
        'as' => 'admin.portal_admins.edit'
    ]);

    Route::post('/portal_admins/update/{id}', [
        'uses' => 'PortalAdminController@update',
        'as' => 'admin.portal_admins.update'
    ]);

    Route::get('/portal_admins/change_password/{id}', [
        'uses' => 'PortalAdminController@change_password',
        'as' => 'admin.portal_admins.change_password'
    ]);

    Route::post('/portal_admins/update_password', [
        'uses' => 'PortalAdminController@update_password',
        'as' => 'admin.portal_admins.update_password'
    ]);

    Route::get('/portal_admins/delete/{id}', [
        'uses' => 'PortalAdminController@delete',
        'as' => 'admin.portal_admins.delete'
    ]);

    Route::post('/portal_admins/destroy/{id}', [
        'uses' => 'PortalAdminController@destroy',
        'as' => 'admin.portal_admins.destroy'
    ]);


    //my profile routes
    Route::get('/profile/', [
        'uses' => 'PortalAdminController@my_profile',
        'as' => 'admin.profile.index'
    ]);

    Route::get('/profile/edit', [
        'uses' => 'PortalAdminController@edit_profile',
        'as' => 'admin.profile.edit'
    ]);

    Route::post('/profile/update/', [
        'uses' => 'PortalAdminController@update_profile',
        'as' => 'admin.profile.update'
    ]);

    Route::get('/profile/change_password', [
        'uses' => 'PortalAdminController@change_my_password',
        'as' => 'admin.profile.change_password'
    ]);

    Route::post('/profile/update_password', [
        'uses' => 'PortalAdminController@update_my_password',
        'as' => 'admin.profile.update_password'
    ]);



    Route::get('/sitesettings/', [
        'uses' => 'AdminSettingsController@site_settings',
        'as' => 'admin.sitesettings.index'
    ]);

    Route::get('/sitesettings/edit', [
        'uses' => 'AdminSettingsController@edit_settings',
        'as' => 'admin.sitesettings.edit'
    ]);

    Route::post('/sitesettings/update', [
        'uses' => 'AdminSettingsController@update_settings',
        'as' => 'admin.sitesettings.update'
    ]);

    

    
    //Messages routes
    Route::get('messages/', [
        'uses' => 'AdminMessagesController@index',
        'as' => 'admin.messages.index'
    ]);

    Route::get('messages/view/{id}', [
        'uses' => 'AdminMessagesController@view',
        'as' => 'admin.messages.view'
    ]);

    Route::get('messages/send', [
        'uses' => 'AdminMessagesController@send',
        'as' => 'admin.messages.send'
    ]);

    Route::post('messages/do_send', [
        'uses' => 'AdminMessagesController@do_send',
        'as' => 'admin.messages.do_send'
    ]);

    Route::get('messages/reply/{id}', [
        'uses' => 'AdminMessagesController@reply',
        'as' => 'admin.messages.reply'
    ]);

    Route::post('messages/do_reply/{id}', [
        'uses' => 'AdminMessagesController@do_reply',
        'as' => 'admin.messages.do_reply'
    ]);

    Route::get('messages/sent', [
        'uses' => 'AdminMessagesController@sent',
        'as' => 'admin.messages.sent'
    ]);

    Route::get('messages/delete/{id}', [
        'uses' => 'AdminMessagesController@delete',
        'as' => 'admin.messages.delete'
    ]);

    Route::post('messages/destroy/{id}', [
        'uses' => 'AdminMessagesController@destroy',
        'as' => 'admin.messages.destroy'
    ]);


    Route::get('messages/get_recipient_type', [
        'uses' => 'AdminMessagesController@get_recipients',
        'as' => 'admin.messages.get_recipient_type'
    ]);

    
    Route::get('/admin/refresh_link', function() {
        return redirect()->back();
    });
    

});