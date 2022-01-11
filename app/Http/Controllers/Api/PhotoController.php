<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index() {

        $photos = Photo::all();

        return response()->json($photos);
    }
}
