<?php

use Illuminate\Support\Facades\DB;

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

Route::get('/hello', function () {
    return view('hello');
});


Route::resource('/registration',  'UsersController');

Route::post('/action','LoginController@login');

Route::get('/admin' , 'AdminController@events');



Route::resource('/fundraiserform',  'EventsController');

Route::resource('/donate', 'DonateController');

Route::post('/donate', 'DonateController@handledonation');

Route::get('/events/delete','EventsController@deleteevent');

Route::get('/events/approve','EventsController@approveevent');


//Route::get('/fundraiserform', function () {
//    return view('fundraiserform');
//});

Route::get('/index', function () {
    $views= DB::table('events')->where('verify','=',1)->get();
    return view('index',['viewsdata'=>$views]);
})->name('index');

Route::get('/login', function () {
    return view('login');
})->name('login');

//Route::get('/donationview', function () {
//    return view('donationview');
//})->name('donationview');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/profile', function () {
    return view('profile');
});







//Route::get('/donate', function () {
// return view('donate');
//})->name('donate');