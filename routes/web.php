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

Route::get('/', function () {
    return view('welcome');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// Route::get('/userslist', function () {
//     return view('users.userslist');
// });

// userslist routes

Route::get('/userslist', 'UserslistController@index');
Route::get('/createuser', 'UserslistController@create');
Route::post('/storeuser', 'UserslistController@store');
Route::get('/edituser/{id}', 'UserslistController@edit');
Route::post('/updateuser/{id}', 'UserslistController@update');
Route::get('/deleteuser/{id}', 'UserslistController@destroy');



// roles routes

Route::get('/roleslist', 'RolesController@index');
Route::get('/createrole', 'RolesController@create');
Route::post('/storerole', 'RolesController@store');
Route::get('/editrole/{id}', 'RolesController@edit');
Route::post('/updaterole/{id}', 'RolesController@update');
Route::get('/deleterole/{id}', 'RolesController@destroy');


// permissions routes

Route::get('/permissionslist', 'PermissionsController@index');
Route::get('/createpermission', 'PermissionsController@create');
Route::post('/storepermission', 'PermissionsController@store');
Route::get('/editpermission/{id}', 'PermissionsController@edit');
Route::post('/updatepermission/{id}','PermissionsController@update');
Route::get('/deletepermission/{id}', 'PermissionsController@destroy');



  
