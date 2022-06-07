<?php

namespace App\Http\Controllers;

use App\Models\TrustedByCompany;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class TrustedByCompanyController extends Controller
{
    




/*
|----------------------------------------------------------------------------------------
|                                    INDEX METHOD
|----------------------------------------------------------------------------------------
*/
    public function index()
    {
        $tbcs = TrustedByCompany::all();
        return view('backend.trusted_by_companies.view', compact('tbcs'));
    }
   




/*
|----------------------------------------------------------------------------------------
|                                    CREATE METHOD
|----------------------------------------------------------------------------------------
*/
    public function create()
    {
        return view('backend.trusted_by_companies.add');
    }
   




/*
|----------------------------------------------------------------------------------------
|                                    STORE METHOD
|----------------------------------------------------------------------------------------
*/
    public function store(Request $request)
    {
        $request->validate([
            '*'             => 'required',
            'link'          => 'required|url',
            'logo'          => 'required|image|mimes:png',
        ], [
            '*.required'    => 'This field is required.',
            'logo.required' => 'This field is required.',
            'link.url'      => 'Please enter a valid url.',
            'logo.image'    => 'Please choose a image file.',
            'logo.mimes'    => 'Logo should be a png file and background should be transparent.',
        ]);

        $logo       = Image::make($request->logo);
        $logo_name  = $request->name . ' ' . Str::random('5') . '.' . $request->logo->getClientOriginalExtension();
        $logo->save(base_path('public/backend/assets/images/tbc/' . $logo_name));

        TrustedByCompany::insert([
            'name'          => $request->name,
            'link'          => $request->link,
            'logo'          => $logo_name,
            'created_at'    => Carbon::now(),
        ]);

        return back()->with('success', 'Successfully added company.');
    }
       




/*
|----------------------------------------------------------------------------------------
|                                    EDIT METHOD
|----------------------------------------------------------------------------------------
*/
    public function edit($id)
    {
        $tcb = TrustedByCompany::find($id);
        return view('backend.trusted_by_companies.edit', compact('tcb'));
    }
   




/*
|----------------------------------------------------------------------------------------
|                                    UPDATE METHOD
|----------------------------------------------------------------------------------------
*/
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required',
            'link'          => 'required|url',
            'logo'          => 'image|mimes:png',
        ], [
            'name.required' => 'This field is required.',
            'link.required' => 'This field is required.',
            'link.url'      => 'Please enter a valid url.',
            'logo.image'    => 'Please choose a image file.',
            'logo.mimes'    => 'Logo should be a png file and background should be transparent.',
        ]);

        if ($request->hasFile('logo')) {
            $tbc_logo   = TrustedByCompany::find($id);
            unlink(base_path('public/backend/assets/images/tbc/' . $tbc_logo->logo));

            $logo       = Image::make($request->logo);
            $logo_name  = $request->name . ' ' . Str::random('5') . '.' . $request->logo->getClientOriginalExtension();

            $logo->save(base_path('public/backend/assets/images/tbc/' . $logo_name));

            TrustedByCompany::find($id)->update([
                'logo'  => $logo_name,
            ]);
        }

        TrustedByCompany::find($id)->update([
            'name'      => $request->name,
            'link'      => $request->link,
        ]);

        return back()->with('success', 'Successfully upadated company');
        
    }
   




/*
|----------------------------------------------------------------------------------------
|                                    DESTROY METHOD
|----------------------------------------------------------------------------------------
*/
    public function destroy($id)
    {
        TrustedByCompany::find($id)->delete();
        return back()->with('success', "Company deleted successfully");
    }
}
