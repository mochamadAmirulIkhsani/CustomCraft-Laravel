<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(){
        return Banner::all();
    }

    public function show($id){
        return Banner::find($id);
    }
}
