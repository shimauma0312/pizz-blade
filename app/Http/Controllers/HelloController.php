<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(Request $request) {

        $name = $request->input('InputName');
        
        return view('hello', ['name' => $name]);
    }

    public function trim (Request $request) {
        $data = $request->input('name');

        return $data;
    }
}
