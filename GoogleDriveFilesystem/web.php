<?php

use App\Http\Controllers\GoogleDriveController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
  $files = Storage::disk('google')->allFiles();
  $firstFile = $files[0];
  $secondFile = $files[1];
  //dump('FIRST FILE NAME: '.$firstFile);
  $details = Storage::disk('google')->getMetadata($firstFile);
  $s_details = Storage::disk('google')->getMetadata($secondFile);
  //dump('Details', $details);
  $url = Storage::disk('google')->url($firstFile);
  $s_url = Storage::disk('google')->url($secondFile);
  //dump('DOWNLOAD LINK', $url);
    return view('welcome', compact('url', 's_url'));
});

Route::get('test', function() {
  Storage::disk('google')->put('test.txt', 'Hello World');
  dd('done');
});

Route::post('upload' , [GoogleDriveController::class, 'index']);
