<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\TrustedByCompany;
use App\Rules\LongDescForService;
use App\Rules\ShortDescForService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
  




/*
|----------------------------------------------------------------------------------------
|                                     INDEX METHOD
|----------------------------------------------------------------------------------------
*/
    public function index()
    {
        $services = Service::all();
        return view('backend.service.view', compact('services'));
    }
  




/*
|----------------------------------------------------------------------------------------
|                                  SERVICE STATUS METHOD
|----------------------------------------------------------------------------------------
*/
    public function serviceStatus(Request $request)
    {
        $service = Service::find($request->service_id);
        $service->status = $request->status;
        $service->save();

        return response()->json(['success' => 'Status change successfully.']);
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
            '*'                 => 'required',
            'name'              => 'required|unique:services,name',
            'short_desc'        => ['required', new ShortDescForService()],
            'long_desc'         => ['required', new LongDescForService()],
            'image'             => 'required|image|mimes:png',
        ], [
            '*.required'        => 'This field is required',
            'name.unique'       => 'Please choose a unique service name, This name exist in records',
            'image.required'    => 'This field is required',
            'image.image'       => 'Please choose a image file',
            'image.mimes'       => 'Image should be a png file',
        ]);

        $image      = Image::make($request->image);
        $img_name   = $request->name . ' ' . Str::random('5') . '.' . $request->image->getClientOriginalExtension();
        $image->save(base_path('public/backend/assets/images/service/' . $img_name));

        Service::insert([
            'name'          => $request->name,
            'icon'          => $request->icon,
            'short_desc'    => $request->short_desc,
            'long_desc'     => $request->long_desc,
            'image'         => $img_name,
            'created_at'    => Carbon::now(),
        ]);

        return back()->with('success', 'Successfully added your service');

        
        
        
        
    }
 




/*
|----------------------------------------------------------------------------------------
|                                     EDIT METHOD
|----------------------------------------------------------------------------------------
*/
    public function edit($id)
    {
        $service = Service::find($id);
        return view('backend.service.edit', compact('service'));
    }
 




/*
|----------------------------------------------------------------------------------------
|                                     UPDATE METHOD
|----------------------------------------------------------------------------------------
*/
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'              => 'required|unique:services,name',
            'icon'              => 'required',
            'short_desc'        => ['required', new ShortDescForService()],
            'long_desc'         => ['required', new LongDescForService()],
            'image'             => 'image|mimes:png',
        ], [
            '*.required'        => 'This field is required',
            'name.unique'       => 'Please choose a unique service name, This name exist in records',
            'image.required'    => 'This field is required',
            'image.image'       => 'Please choose a image file',
            'image.mimes'       => 'Image should be a png file',
        ]);

        if ($request->hasFile('image')) {
            $service_img = Service::find($id);
            unlink(base_path('public/backend/assets/images/service/' . $service_img->image));

            $img        = Image::make($request->image);
            $img_name   = $request->name . ' ' . Str::random('5') . '.' . $request->image->getClientOriginalExtension();
            $img->save(base_path('public/backend/assets/images/service/' . $img_name));

            Service::find($id)->update([
                'image' => $img_name,
            ]);
        }

        Service::find($id)->update([
            'name' => $request->name,
            'icon' => $request->icon,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'updated_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Successfully updated your service');

    }
 




/*
|----------------------------------------------------------------------------------------
|                                     DESTROY METHOD
|----------------------------------------------------------------------------------------
*/
    public function destroy($id)
    {
        Service::find($id)->delete();
        return redirect('/service');
    }





/*
|----------------------------------------------------------------------------------------
|                                  SERVICE DETAILS METHOD
|----------------------------------------------------------------------------------------
*/
    public function serviceDetails($id)
    {
        $service = Service::find($id);
        return view('backend.service.details', compact('service'));
    }
}
