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
Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/home', 'HomeController@index');

Route::get('proposal_requests/{proposalRequest}/edit', 'ProposalRequestsController@edit');
Route::patch('proposal_requests/{proposalRequest}', 'ProposalRequestsController@update');
Route::delete('proposal_requests/{proposalRequest}', 'ProposalRequestsController@destroy');
Route::resource('proposal_requests', 'ProposalRequestsController');

Route::get('/clients/all', 'ClientsController@index');
Route::get('client_list/{client}/edit', 'ClientsController@edit');
Route::patch('client_list/{client}', 'ClientsController@update');
Route::delete('client_list/{client}', 'ClientsController@destroy');
Route::post('client_list/{name}/contacts', 'ClientsController@addContact');
Route::get('client_list/{name}', 'ClientsController@show');
Route::resource('clients', 'ClientsController');

Route::get('/{clientName}/{campaignName}', 'ProposalRequestsController@show');
Route::post('{clientName}/{campaignName}/proposals', 'ProposalRequestsController@addFile');

