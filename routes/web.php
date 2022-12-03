<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function (GuzzleHttp\Client $client) {
    $response = $client->request('GET', $_GET['region']);
    $countries = json_decode($response->getBody());

    return view('home', ['countries' => $countries]);
});
