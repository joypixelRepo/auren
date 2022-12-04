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
    $response = $client->request('GET', 'all');
    $data = json_decode($response->getBody());
    return view('welcome', ['countries' => $data]);
});

Route::get('/region/{region}', function (GuzzleHttp\Client $client, $region) {
    $response = $client->request('GET', 'region/'.$region);
    $data = json_decode($response->getBody());
    return view('countries', ['countries' => $data]);
});
