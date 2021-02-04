<?php
require 'simple_html_dom.php';


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('login', 'API\AuthController@login');
Route::post('login', 'API\AuthController@login');
Route::post('register', 'API\AuthController@register');

Route::middleware('auth:api')->group(function () {
    Route::post('user_detail', 'API\AuthController@user_detail');
});
Route::post('download', function (Request $request) {
    $url = $request->url;

    // Use basename() function to return the base name of file
    //$file_name = basename($url);
    $file_name = 'downfile';
    // Use file_get_contents() function to get the file
    // from url and use file_put_contents() function to
    // save the file by using base name
    if (file_put_contents($file_name, file_get_contents($url))) {
        echo "File downloaded successfully from [$url] to [$file_name]";
    } else {
        echo "File downloading failed.";
    }
});
Route::post('get_lesson_detail', function (Request $request) {
    $url = strrev($request->info);
    \Log::info($url);
    //decode url
    $url = strrev($url);
    $codec = [
        ['a', '##3##'],
        ['s', '##4##'],
        ['f', '##&@%##'],
        ['e', '##($!##'],
        ['p', '##(%(&##'],
        ['o', '##27##'],
        ['i', '##&($##'],
        ['v', '##)&!@##'],
        ['x', '##78@*##'],
    ];
    foreach ($codec as $obj) {
        $url = str_replace($obj[1], $obj[0],  $url);
    }

    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);
    curl_close($ch);

    $data = file_get_html($url);

    //1st-replace
    $data = str_replace('<script', '', $data);
    $data = str_replace('<head', '', $data);
    $data = str_replace('<title', '', $data);
    $data = str_replace('<style', '', $data);
    $data = str_replace('<!doctype html>', '', $data);
    $data = str_replace('href', 'lllliinnnkkk', $data);
    $data = str_replace('http://', 'http###', $data);
    $data = str_replace('https://', 'https###', $data);
    //encode
    $codec = [
        ['a', '##3##'],
        ['s', '##4##'],
        ['f', '##&@%##'],
        ['e', '##($!##'],
        ['p', '##(%(&##'],
        ['o', '##27##'],
        ['i', '##&($##'],
        ['v', '##)&!@##'],
        ['x', '##78@*##'],
    ];
    foreach ($codec as $obj) {
        $data = str_replace($obj[0], $obj[1],  $data);
    }

    $data = strrev($data);

    //return
    return  $data;
});
