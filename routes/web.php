<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
use App\Http\Controllers\CountriesController;

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
    return view('home');
});

Route::get('/region/{region}', function (GuzzleHttp\Client $client, $region) {
    //get database data
    $notes = DB::table('countries')->get();
    $dataDb = json_decode($notes);

    // get API data
    $responseApi = $client->request('GET', 'region/'.$region);
    $dataApi = json_decode($responseApi->getBody());

    // check if the country is in database and add to an array
    $countriesInDb = [];
    foreach ($dataApi as $countryApi) {
      foreach ($dataDb as $countryDb) {
        if($countryApi->cca2 == $countryDb->cca2) {
          $countriesInDb[] = $countryApi->cca2;
        }
      }
    }

    return view('countries', 
      [
        'countriesApi' => $dataApi,
        'countriesDb' => $dataDb,
        'countriesInDb' => $countriesInDb,
      ],
    );
});




