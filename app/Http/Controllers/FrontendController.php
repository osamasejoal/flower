<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // ===================================
    // FRONTPAGE method for view frontpage
    // ===================================
    public function frontpage(){
        return view('frontend.index');
    }
}
