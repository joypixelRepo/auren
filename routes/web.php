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

    //show countries of the selected region
    return view('countries', 
      [
        'countriesApi' => $dataApi,
        'countriesDb' => $dataDb,
        'countriesInDb' => $countriesInDb,
      ],
    );
});

Route::get('/view/{countryCode}', function (GuzzleHttp\Client $client, $countryCode) {
    // get API data
    $responseApi = $client->request('GET', 'alpha/'.$countryCode);
    $dataApi = json_decode($responseApi->getBody());

    //show information of the selected country
    return view('country', 
      ['countryApi' => $dataApi],
    );
});

Route::get('/add/{countryCode}', function (GuzzleHttp\Client $client, $countryCode) {
    // get API data
    $responseApi = $client->request('GET', 'alpha/'.$countryCode);
    $dataApi = json_decode($responseApi->getBody());

    //insert country in database
    DB::table('countries')->insert([
      'common_name' => $dataApi[0]->name->common,
      'official_name' => $dataApi[0]->name->official,
      'capital' => $dataApi[0]->capital[0],
      'region' => $dataApi[0]->region,
      'cca2' => $dataApi[0]->cca2,
    ]);

    return redirect($_GET['ret']);

});

Route::get('/upd/{countryCode}', function (GuzzleHttp\Client $client, $countryCode) {
    // get API data
    $responseApi = $client->request('GET', 'alpha/'.$countryCode);
    $dataApi = json_decode($responseApi->getBody());

    //update country in database
    DB::table('countries')->where('cca2', $countryCode)->update([
        'common_name' => $dataApi[0]->name->common,
        'official_name' => $dataApi[0]->name->official,
        'capital' => $dataApi[0]->capital[0],
        'region' => $dataApi[0]->region,
        'cca2' => $dataApi[0]->cca2,
      ]);

    return redirect($_GET['ret']);

});

Route::get('/del/{countryCode}', function (GuzzleHttp\Client $client, $countryCode) {
    // get API data
    $responseApi = $client->request('GET', 'alpha/'.$countryCode);
    $dataApi = json_decode($responseApi->getBody());

    //delete country in database
    DB::table('countries')->where('cca2', '=', $countryCode)->delete();

    return redirect($_GET['ret']);

});




