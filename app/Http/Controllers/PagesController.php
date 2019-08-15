<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
   
    public function index(){
        return view('home');
    }

    public function donaciones(){
        return view('donaciones');
    }

    public function libros(){
        return view('libros');
    }

    public function nosotros(){
        return view('nosotros');
    }
}
