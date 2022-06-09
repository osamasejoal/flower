<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Rules\QuoteForTestimonial;
use App\Rules\ShortDescForService;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class TestimonialController extends Controller
{





/*
|----------------------------------------------------------------------------------------
|                                    INDEX METHOD
|----------------------------------------------------------------------------------------
*/
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('backend.testimonial.view', compact('testimonials'));
    }





/*
|----------------------------------------------------------------------------------------
|                               TESTIMONIAL STATUS METHOD
|----------------------------------------------------------------------------------------
*/
    public function testimonialStatus(Request $request)
    {
        $testimonial            = Testimonial::find($request->testimonial_id);
        $testimonial->status    = $request->status;
        $testimonial->save();

        return response()->json(['success' => 'Status change successfully.']);
    }





/*
|----------------------------------------------------------------------------------------
|                                    CREATE METHOD
|----------------------------------------------------------------------------------------
*/
    public function create()
    {
        return view('backend.testimonial.add');
    }





/*
|----------------------------------------------------------------------------------------
|                                    STORE METHOD
|----------------------------------------------------------------------------------------
*/
    public function store(Request $request)
    {
        // Validation portion
        $request->validate([
            '*'             => 'required',
            'quote'         => ['required', new QuoteForTestimonial],
            'image'         => 'required|image|mimes:jpg',
        ], [
            '*'             => 'This field is required',
            'image.image'   => 'Please choose a image file',
            'image.mimes'   => 'Please choose a jpg file',
        ]);


        // Image portion
        $img        = Image::make($request->image)->resize(100, 100);
        $img_name   = $request->name . ' ' . $request->profession . ' ' . Str::random('5') . '.' .$request->image->getClientOriginalExtension();
        $img->save(base_path('public/backend/assets/images/testimonial/' . $img_name));


        // insert portion
        Testimonial::insert([
            'name'          => $request->name,
            'profession'    => $request->profession,
            'quote'         => $request->quote,
            'image'         => $img_name,
            'created_at'    => Carbon::now(),
        ]);

        return back()->with('success', 'Successfully added your testimonial');

    }





/*
|----------------------------------------------------------------------------------------
|                                    EDIT METHOD
|----------------------------------------------------------------------------------------
*/
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('backend.testimonial.edit', compact('testimonial'));
    }





/*
|----------------------------------------------------------------------------------------
|                                    UPDATE METHOD
|----------------------------------------------------------------------------------------
*/
    public function update(Request $request, $id)
    {
        // Validation portion
        $request->validate([
            'name'          => 'required',
            'profession'    => 'required',
            'quote'         => ['required', new QuoteForTestimonial],
            'image'         => 'image|mimes:jpg',
        ], [
            '*'             => 'This field is required',
            'image.image'   => 'Please choose a image file',
            'image.mimes'   => 'Please choose a jpg file',
        ]);

        // Image portion
        if ($request->hasFile('image')) {
            $testimonial = Testimonial::find($id);
            unlink(base_path('public/backend/assets/images/testimonial/' . $testimonial->image)); 
            
            $img        = Image::make($request->image)->resize(100, 100);
            $img_name   = $request->name . ' ' . $request->profession . ' ' . Str::random('5') . '.' .           $request->image->getClientOriginalExtension();
            $img->save(base_path('public/backend/assets/images/testimonial/' . $img_name));

            Testimonial::find($id)->update([
                'image'     => $img_name,
            ]);
        }


        // update portion
        Testimonial::find($id)->update([
            'name'          => $request->name,
            'profession'    => $request->profession,
            'quote'         => $request->quote,
            'updated_at'    => Carbon::now(),
        ]);

        return back()->with('success',
            'Successfully updated your testimonial'
        );

    }





/*
|----------------------------------------------------------------------------------------
|                                    DESTROY METHOD
|----------------------------------------------------------------------------------------
*/
    public function destroy($id)
    {
        Testimonial::find($id)->delete();
        return back()->with('success', 'Successfully deleted your testimonial');
    }
}
