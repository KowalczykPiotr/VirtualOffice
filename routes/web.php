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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/letters', 'LettersController@index');
Route::get('/letters_modal/{tab}', 'LetterModalController@index');

Route::get('clients/clients/', 'Clients\ClientsController@index');
Route::post('clients/clients/', 'Clients\ClientsController@index');
Route::get('clients/clients/add', 'Clients\ClientsController@add');
Route::post('clients/clients/save', 'Clients\ClientsController@save');
Route::post('clients/clients/update', 'Clients\ClientsController@update');


Route::get('clients/clients/{skip}', 'Clients\ClientsController@index');
Route::post('clients/clients/{skip}', 'Clients\ClientsController@index');
Route::get('clients/clients/view/{id}', 'Clients\ClientsController@view');
Route::get('clients/clients/edit/{id}', 'Clients\ClientsController@edit');
Route::get('clients/clients/delete/{id}', 'Clients\ClientsController@delete');

Route::get('history/history/', 'History\HistoryController@index');
Route::get('history/history/{page}', 'History\HistoryController@index');
Route::post('history/history/', 'History\HistoryController@index');
Route::post('history/history/{page}', 'History\HistoryController@index');
Route::get('history/view/add/{id}', 'History\HistoryController@add');
Route::post('history/save/', 'History\HistoryController@save');

Route::get('history/view/{letter}', 'History\HistoryController@view');



Route::get('admin/customer-groups/', 'Admin\ClientGroupsController@index')->middleware('auth');
Route::get('admin/customer-groups/add/', 'Admin\ClientGroupsController@add')->middleware('auth');
Route::post('admin/customer-groups/save/', 'Admin\ClientGroupsController@save')->middleware('auth');
Route::get('admin/customer-groups/delete/{id}', 'Admin\ClientGroupsController@delete')->middleware('auth');
Route::get('admin/customer-groups/edit/{id}', 'Admin\ClientGroupsController@edit')->middleware('auth');
Route::post('admin/customer-groups/update/', 'Admin\ClientGroupsController@update')->middleware('auth');

Route::get('admin/letter-types/', 'Admin\LetterTypesController@index')->middleware('auth');
Route::get('admin/letter-types/add/', 'Admin\LetterTypesController@add')->middleware('auth');
Route::post('admin/letter-types/save/', 'Admin\LetterTypesController@save')->middleware('auth');
Route::get('admin/letter-types/delete/{id}', 'Admin\LetterTypesController@delete')->middleware('auth');
Route::get('admin/letter-types/edit/{id}', 'Admin\LetterTypesController@edit')->middleware('auth');
Route::post('admin/letter-types/update/', 'Admin\LetterTypesController@update')->middleware('auth');

Route::get('admin/users/', 'Admin\UsersController@index')->middleware('auth');
Route::get('admin/users/register', 'Admin\UsersController@register')->middleware('auth');
Route::post('admin/users/save', 'Admin\UsersController@save')->middleware('auth');
Route::get('admin/users/delete/{id}', 'Admin\UsersController@delete')->middleware('auth');
Route::get('admin/users/edit/{id}', 'Admin\UsersController@edit')->middleware('auth');
Route::post('admin/users/update', 'Admin\UsersController@update')->middleware('auth');


Route::get('api/customer/{id}', 'Api\CustomerController@show');

Route::get('api/customers/', 'Api\CustomerController@index');
Route::get('api/customers/{skip}/', 'Api\CustomerController@index');
Route::get('api/customers/{skip}/{limit}', 'Api\CustomerController@index');

Route::get('api/letter_types/', 'Api\Letter_typeController@index');

Route::post('api/letters/provide/', 'Api\LetterController@provide')->middleware('auth');
Route::post('api/letters/mail','Api\LetterController@mail')->middleware('auth');
Route::post('api/letters/','Api\LetterController@store')->middleware('auth');

Route::get('api/letters/', 'Api\LetterController@index');
Route::get('api/letters/{customer_id}', 'Api\LetterController@index');
Route::get('api/letters/{customer_id}/{letter_type_id}', 'Api\LetterController@index');


