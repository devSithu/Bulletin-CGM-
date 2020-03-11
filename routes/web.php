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



// Route::get('/home',function(){
//     $data=News::orderBy('id','desc')->paginate(3);
    
//     return view('home')->with(['data'=>$data]);
// });

Route::get('/home','HomeController@home');
Route::get('all', 'UserController@showAll');

//session_login/logout/register
Route::get('/register_page','User\RegisterController@showRegister');
Route::post('/user_register','User\RegisterController@register');
Route::get('/login_page','User\LoginController@login_page');
Route::post('/user_login','User\LoginController@login');
Route::get('/user_logout','User\LoginController@logout');

//password reset
Route::get('verify','User\PasswordController@showVerificationForm')->name('showVerification');
Route::post('verify', 'User\PasswordController@sendResetPassword')->name('password.email');
Route::get('password/reset/{token}', 'User\PasswordController@showResetForm')->name('resetPassword');
Route::post('password/reset', 'User\PasswordController@changePassword')->name('changePassword');


//user
Route::get('/create_news_page','NewsController@create_news_page');
Route::post('/add_news','NewsController@store');
Route::get('/delete_news/{id}','NewsController@destroy')->middleware('checkrole');
Route::get('/update_page/{id}','NewsController@update_page')->middleware('checkrole');
Route::post('/update_page/update/{id}','NewsController@update');

//Admin
Route::get('/look_user_info','AdminController@look_user_info')->middleware('checkadmin');
Route::get('/delete_user_account/{id}','AdminController@delete_user_account');
Route::get('/update_user_account_page/{id}','AdminController@update_user_account_page');
Route::post('/update_user_account_page/update_user_account_info/{id}','AdminController@update_user_account_info');

//User Profile
Route::get('/look_info/{id}','UserProfileController@look_info');
Route::post('/look_info/update_user_profile/{id}','UserProfileController@update_user_profile');
Route::get('/change_password/{id}','UserProfileController@change_password');
Route::post('/change_password/change/{id}','UserProfileController@change');




