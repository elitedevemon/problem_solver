<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GoogleDriveController extends Controller
{
  public function index(Request $request)
  {
    Storage::disk('google')->putFileAs('', $request->file('image'), 'bootstrap.css');
   // dd($request->file('image')->store('', 'google'));
  }
}
