<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadsController extends Controller
{

    function __construct(){
        $this->middleware('auth');
    }

    public function download($filename){
        return response()->download(public_path('\files\Musa'.$filename.'.pdf'));
    }
    
}
