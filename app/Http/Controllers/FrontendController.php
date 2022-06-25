<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Faq;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\TrustedByCompany;
use Illuminate\Http\Request;

class FrontendController extends Controller
{




    
    // ==================================================================
    //                        FRONTPAGE METHOD
    // ==================================================================
    public function frontpage(){
        $banner         = Banner::firstOrFail();
        $tbcs           = TrustedByCompany::where('status', 1)->get();
        $services       = Service::where('status', 1)->get();
        $testimonials   = Testimonial::where('status', 1)->get();
        $faqs           = Faq::where('status', 1)->get();

        return view('frontend.index', compact('banner', 'tbcs', 'services', 'testimonials', 'faqs'));
    }





    // ==================================================================
    //                       SERVICE DETAILS METHOD
    // ==================================================================
    public function servicePage($id){
        echo $id;
        // $service = Service::find($id);
        // return view('frontend.service-details');
    }

}
