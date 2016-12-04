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

    Auth::routes();

    Route::group(['prefix' => 'messages'], function () {
        Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
        Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
        Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
        Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
        Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
    });

    Route::get('/', 'PagesController@home');
    Route::get('/about', 'PagesController@about');
    Route::get('/home', 'HomeController@index');

    Route::resource('/tasklist', 'TaskListController');
    Route::get('/tasklist/{name}', 'TaskListController@show');
    Route::post('/tasklist/{name}/tasks', 'TaskListController@addTask');


    Route::get('/clients/all', 'ClientsController@index');
    Route::get('proposal_requests/test', 'ProposalRequestsController@test');
    Route::get('proposal_requests/{proposalRequest}/edit', 'ProposalRequestsController@edit');
    Route::patch('proposal_requests/{proposalRequest}', 'ProposalRequestsController@update');
    Route::delete('proposal_requests/{proposalRequest}', 'ProposalRequestsController@destroy');
    Route::resource('proposal_requests', 'ProposalRequestsController');

    Route::get('client_list/{client}/edit', 'ClientsController@edit');
    Route::get('client_list/{name}', 'ClientsController@show');
    Route::patch('client_list/{client}', 'ClientsController@update');
    Route::delete('client_list/{client}', 'ClientsController@destroy');
    Route::post('client_list/{name}/contacts', 'ClientsController@addContact');
    Route::resource('clients', 'ClientsController');

    Route::get('/{clientName}/{campaignName}', 'ProposalRequestsController@show');
    Route::post('{clientName}/{campaignName}/proposals', 'ProposalRequestsController@addFile');


