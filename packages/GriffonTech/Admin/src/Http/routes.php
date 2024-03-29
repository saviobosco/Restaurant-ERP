<?php

Route::group(['middleware' => ['web']], function() {


    /** Admin routes */
    Route::prefix('admin')->group(function (){

        Route::get('/login', 'GriffonTech\Admin\Http\Controllers\LoginController@showLoginForm')->defaults('_config', [
            'view' => 'admin::admin.login.index'
        ])->name('admin.login.index');


        Route::post('/login', 'GriffonTech\Admin\Http\Controllers\LoginController@login')->defaults('_config', [
            'redirect' => 'admin.dashboard.index'
        ])->name('admin.login.store');


        Route::group(['middleware' => ['admin']], function(){

            Route::get('/logout', 'GriffonTech\Admin\Http\Controllers\LoginController@logout')
                ->defaults('_config', [
                    'redirect' => 'admin.login.index'
                ])->name('admin.logout');

            /** Admin dashboard */
            Route::get('dashboard/index', 'GriffonTech\Admin\Http\Controllers\DashboardController@index')->defaults('_config', [
                'view' => 'admin::admin.dashboard.index'
            ])->name('admin.dashboard.index');


            /** Jobs */
            Route::get('jobs/index', 'GriffonTech\Admin\Http\Controllers\JobsController@index')->defaults('_config', [
                'view' => 'admin::admin.jobs.index'
            ])->name('admin.jobs.index');

            Route::get('jobs/create', 'GriffonTech\Admin\Http\Controllers\JobsController@create')->defaults('_config', [
                'view' => 'admin::admin.jobs.create'
            ])->name('admin.jobs.create');

            Route::post('jobs/create', 'GriffonTech\Admin\Http\Controllers\JobsController@store')->defaults('_config', [
                'redirect' => 'admin.jobs.index'
            ])->name('admin.jobs.store');

            Route::get('jobs/edit/{job}', 'GriffonTech\Admin\Http\Controllers\JobsController@edit')->defaults('_config', [
                'view' => 'admin::admin.jobs.edit'
            ])->name('admin.jobs.edit');

            Route::post('jobs/edit/{job}', 'GriffonTech\Admin\Http\Controllers\JobsController@update')->defaults('_config', [
                'redirect' => 'admin.jobs.edit'
            ])->name('admin.jobs.update');

            Route::get('jobs/view/{job}', 'GriffonTech\Admin\Http\Controllers\JobsController@show')->defaults('_config', [
                'view' => 'admin::admin.jobs.view'
            ])->name('admin.jobs.view');


            Route::delete('subjects/delete/{subject}', 'GriffonTech\Admin\Http\Controllers\JobsController@destroy')->defaults('_config', [
                'redirect' => 'admin.jobs.index'
            ])->name('admin.jobs.delete');


            /** candidates */
            Route::get('candidates/index', 'GriffonTech\Admin\Http\Controllers\CandidatesController@index')->defaults('_config', [
                'view' => 'admin::admin.candidates.index'
            ])->name('admin.candidates.index');

            Route::get('candidates/create', 'GriffonTech\Admin\Http\Controllers\CandidatesController@create')->defaults('_config', [
                'view' => 'admin::admin.candidates.create'
            ])->name('admin.candidates.create');

            Route::post('candidates/create', 'GriffonTech\Admin\Http\Controllers\CandidatesController@store')->defaults('_config', [
                'redirect' => 'admin.candidates.index'
            ])->name('admin.candidates.store');

            Route::get('candidates/edit/{candidate}', 'GriffonTech\Admin\Http\Controllers\CandidatesController@edit')->defaults('_config', [
                'view' => 'admin::admin.candidates.edit'
            ])->name('admin.candidates.edit');

            Route::post('candidates/edit/{candidate}', 'GriffonTech\Admin\Http\Controllers\CandidatesController@update')->defaults('_config', [
                'redirect' => 'admin.candidates.edit'
            ])->name('admin.candidates.update');

            Route::get('candidates/view/{candidate}', 'GriffonTech\Admin\Http\Controllers\CandidatesController@show')->defaults('_config', [
                'view' => 'admin::admin.candidates.view'
            ])->name('admin.candidates.view');
        });

    });
});
