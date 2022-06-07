<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{





/*
|----------------------------------------------------------------------------------------
|                                   INDEX METHOD
|----------------------------------------------------------------------------------------
*/
    public function index()
    {
        $banner = Banner::get()->firstOrFail();
        return view('backend.banner.view', compact('banner'));
    }





/*
|----------------------------------------------------------------------------------------
|                                   UPDATE METHOD
|----------------------------------------------------------------------------------------
*/
    public function update(Request $request, $id)
    {
        $request->validate([
            '*' => 'required',
        ], [
            '*.required' => 'This field is required.',
        ]);

        Banner::find($id)->update([
            'title'         => $request->title,
            'description'   => $request->description,
        ]);

        return back()->with('success', 'Successfully updated your Banner data.');
    }

}
