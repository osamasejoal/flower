<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
  




/*
|----------------------------------------------------------------------------------------
|                                     INDEX METHOD
|----------------------------------------------------------------------------------------
*/
    public function index()
    {
        return "serveice index";
    }
 




/*
|----------------------------------------------------------------------------------------
|                                     CREATE METHOD
|----------------------------------------------------------------------------------------
*/
    public function create()
    {
        return view('backend.service.add');
    }
 




/*
|----------------------------------------------------------------------------------------
|                                     STORE METHOD
|----------------------------------------------------------------------------------------
*/
    public function store(Request $request)
    {
        $request->validate([
            '*' => 'required',
            'name' => 'unique:services,name',
            'short_desc' => 'between:5,10',
            'image' => 'required'
        ], [
            '*.required' => 'This field is required',
            'image.required' => 'This field is required',
        ]);
        
    }
 




/*
|----------------------------------------------------------------------------------------
|                                     EDIT METHOD
|----------------------------------------------------------------------------------------
*/
    public function edit(Service $service)
    {
        //
    }
 




/*
|----------------------------------------------------------------------------------------
|                                     UPDATE METHOD
|----------------------------------------------------------------------------------------
*/
    public function update(Request $request, Service $service)
    {
        //
    }
 




/*
|----------------------------------------------------------------------------------------
|                                     DESTROY METHOD
|----------------------------------------------------------------------------------------
*/
    public function destroy(Service $service)
    {
        //
    }
}
