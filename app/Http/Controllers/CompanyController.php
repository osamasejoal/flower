<?php

namespace App\Http\Controllers;

use App\Models\CompanyInfo;
use App\Models\CompanySocial;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class CompanyController extends Controller
{





/*
|----------------------------------------------------------------------------------------
|                                COMPANY INFO EDIT METHOD
|----------------------------------------------------------------------------------------
*/
public function infoEdit(){
    $c_info = CompanyInfo::firstOrFail();
    return view('backend.company.info.edit', compact('c_info'));
}





/*
|----------------------------------------------------------------------------------------
|                                COMPANY INFO EDIT METHOD
|----------------------------------------------------------------------------------------
*/
public function infoUpdate(Request $request, $id){

    // Validation portion
    $request->validate([
        '*'             => 'required',
        'logo'          => 'image|mimes:png',
    ], [
        '*.required'    => 'This field is required',
        'logo.image'    => 'Please choose a image file',
        'logo.mimes'    => 'Please choose a png logo',
    ]);

    // Image portion
    if ($request->hasFile('logo')) {
        $c_info     = CompanyInfo::fin($id);
        unlink(base_path('public/backend/assets/images/company-info/' . $c_info->logo));

        $logo       = Image::make($request->logo);
        $logo_name  = 'company_logo' . '.' . $request->logo->getClientOriginalExtension();
        $logo->save(base_path('public/backend/assets/images/company-info/' . $logo_name));

        $c_info->update([
            'logo'      => $logo_name,
        ]);

    }

    // Update portion
    CompanyInfo::find($id)->update([
        'name'          => $request->name,
        'title'         => $request->title,
        'description'   => $request->description,
        'phone'         => $request->phone,
        'call_time'     => $request->call_time,
        'city'          => $request->city,
        'country'       => $request->country,
        'location'      => $request->location,
        'updated_at'    => Carbon::now(),
    ]);

    return back()->with('success', 'Successfully updated your Company info');
}





/*
|----------------------------------------------------------------------------------------
|                              COMPANY SOCIAL INDEX METHOD
|----------------------------------------------------------------------------------------
*/
public function socialIndex(){
    $socials = CompanySocial::all();
    return view('backend.company.social.view', compact('socials'));
}





/*
|----------------------------------------------------------------------------------------
|                               COMPANY SOCIAL STATUS METHOD
|----------------------------------------------------------------------------------------
*/
    public function socialStatus(Request $request)
    {
        $social = CompanySocial::find($request->social_id);
        $social->status = $request->status;
        $social->save();

        return response()->json(['success' => 'Status change successfully.']);
    }





/*
|----------------------------------------------------------------------------------------
|                                COMPANY SOCIAL CREATE METHOD
|----------------------------------------------------------------------------------------
*/
public function socialCreate(){
    return view('backend.company.social.add');
}





/*
|----------------------------------------------------------------------------------------
|                               COMPANY SOCIAL STORE METHOD
|----------------------------------------------------------------------------------------
*/
public function socialStore(Request $request){

    // Validation portion
    $request->validate([
        'icon'              => 'required',
        'link'              => 'required|active_url',
    ], [
        '*.required'        => 'This field is required',
        'link.active_url'   => 'Please enter a active url',
    ]);

    // Insert portion
    CompanySocial::insert([
        'icon'              => $request->icon,
        'link'              => $request->link,
        'created_at'        => Carbon::now(),
    ]);

    return back()->with('success', 'Successfully added your Social media');

}





/*
|----------------------------------------------------------------------------------------
|                              COMPANY SOCIAL DESTROY METHOD
|----------------------------------------------------------------------------------------
*/
public function socialDestroy($id){

    CompanySocial::find($id)->delete();

    return back()->with('success', 'Successfully deleted your Social media');

}

}
