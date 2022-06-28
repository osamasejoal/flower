<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class PortfolioController extends Controller
{
    




/*
|----------------------------------------------------------------------------------------
|                                  INDEX METHOD
|----------------------------------------------------------------------------------------
*/
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('backend.portfolio.view', compact('portfolios'));
    }





/*
|----------------------------------------------------------------------------------------
|                                PORTFOLIO STATUS METHOD
|----------------------------------------------------------------------------------------
*/
    public function portfolioStatus(Request $request)
    {
        $portfolio = Portfolio::find($request->portfolio_id);
        $portfolio->status = $request->status;
        $portfolio->save();

        return response()->json(['success' => 'Status change successfully.']);
    }





/*
|----------------------------------------------------------------------------------------
|                                  CREATE METHOD
|----------------------------------------------------------------------------------------
*/
    public function create()
    {
        return view('backend.portfolio.add');
    }





/*
|----------------------------------------------------------------------------------------
|                                  STORE METHOD
|----------------------------------------------------------------------------------------
*/
    public function store(Request $request)
    {

        // Validation Portion
        $request->validate([
            '*'             => 'required',
            'link'          => 'required|url',
            'image'         => 'required|image|mimes:jpg,jpeg',
        ], [
            '*.required'    => 'This field is required',
            'link.url'      => 'Please enter a valid link',
            'image.image'   => 'Please choose a image file',
            'image.mimes'   => 'Please choose a jpg or jpeg file',
        ]);


        // Image Portion
        $img        = Image::make($request->image)->resize(800, 600);
        $img_name   = $request->name . ' ' . Str::random('5') . '.' . $request->image->getClientOriginalExtension();
        $img->save(base_path('public/backend/assets/images/portfolio/' . $img_name));


        // Insert Portion
        Portfolio::insert([
            'type'          => $request->type,
            'name'          => $request->name,
            'link'          => $request->link,
            'image'         => $img_name,
            'created_at'    => Carbon::now(),
        ]);

        return back()->with('success', 'Successfully added your project');

    }





/*
|----------------------------------------------------------------------------------------
|                                  EDIT METHOD
|----------------------------------------------------------------------------------------
*/
    public function edit($id)
    {
        $portfolio = Portfolio::find($id);
        return view('backend.portfolio.edit', compact('portfolio'));
    }





/*
|----------------------------------------------------------------------------------------
|                                  UPDATE METHOD
|----------------------------------------------------------------------------------------
*/
    public function update(Request $request, $id)
    {
        // Validation Portion
        $request->validate([
            '*'             => 'required',
            'link'          => 'required|url',
            'image'         => 'image|mimes:jpg,jpeg',
        ], [
            '*.required'    => 'This field is required',
            'link.url'      => 'Please enter a valid link',
            'image.image'   => 'Please choose a image file',
            'image.mimes'   => 'Please choose a jpg or jpeg file',
        ]);


        // Image Portion
        if ($request->hasFile('image')) {
            $portfolio  = Portfolio::find($id);
            unlink(base_path('public/backend/assets/images/portfolio/' . $portfolio->image));

            $img        = Image::make($request->image)->resize(800, 600);
            $img_name   = $request->name . ' ' . Str::random('5') . '.' . $request->image->getClientOriginalExtension();
            $img->save(base_path('public/backend/assets/images/portfolio/' . $img_name));

            $portfolio->update([
                'image' => $img_name,
            ]);
        }


        // update Portion
        Portfolio::find($id)->update([
            'type'          => $request->type,
            'name'          => $request->name,
            'link'          => $request->link,
            'updated_at'    => Carbon::now(),
        ]);

        return back()->with('success', 'Successfully updater your project');
    }





/*
|----------------------------------------------------------------------------------------
|                                  DESTROY METHOD
|----------------------------------------------------------------------------------------
*/
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        unlink(base_path('public/backend/assets/images/portfolio/' . $portfolio->image));
        
        $portfolio->delete();
        return back()->with('success', 'Successfully deleted your project');
    }
}
