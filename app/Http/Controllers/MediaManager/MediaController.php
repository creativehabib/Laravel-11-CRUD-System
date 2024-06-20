<?php

namespace App\Http\Controllers\MediaManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    # construct
    // public function __construct()
    // {
    //     $this->middleware(['permission:media_manager'])->only('index');
    // }
    
    # get media files
    public function index()
    {
        return view('mediaManager.index');
    }
}
