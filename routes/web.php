<?php

use Illuminate\Support\Facades\Route;

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

//Homepage
Route::get('/', function () {
    return view('homepage');
});


//About Us


//Contact Us
Route::get('/contact', function () {
    return view('contact_us');
});

//FAQ
Route::get('/faq', function () {
    return view('faq');
});

//About
Route::get('/about', function () {
    return view('about');
});

Route::get('/test', function () {
    return view('testingPage');
});