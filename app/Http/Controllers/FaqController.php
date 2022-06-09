<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FaqController extends Controller
{





/*
|----------------------------------------------------------------------------------------
|                                  INDEX METHOD
|----------------------------------------------------------------------------------------
*/
    public function index()
    {
        $faqs = Faq::all();
        return view('backend.faq.view', compact('faqs'));
    }





/*
|----------------------------------------------------------------------------------------
|                                  FAQ STATUS METHOD
|----------------------------------------------------------------------------------------
*/
    public function faqStatus(Request $request)
    {
        $faq = Faq::find($request->faq_id);
        $faq->status = $request->status;
        $faq->save();

        return response()->json(['success' => 'Status change successfully.']);
    }





/*
|----------------------------------------------------------------------------------------
|                                  CREATE METHOD
|----------------------------------------------------------------------------------------
*/
    public function create()
    {
        return view('backend.faq.add');
    }





/*
|----------------------------------------------------------------------------------------
|                                  STORE METHOD
|----------------------------------------------------------------------------------------
*/
    public function store(Request $request)
    {
        // Validation portion
        $request->validate([
            '*'             => 'required'
        ], [
            '*.required'    => 'This field is required'
        ]);

        // Insert portion
        Faq::insert([
            'question'      => $request->question,
            'answer'        => $request->answer,
            'created_at'    => Carbon::now(),
        ]);

        return back()->with('success', 'Successfully added your FAQ');
    }





/*
|----------------------------------------------------------------------------------------
|                                  EDIT METHOD
|----------------------------------------------------------------------------------------
*/
    public function edit($id)
    {
        $faq = Faq::find($id);
        return view('backend.faq.edit', compact('faq'));
    }





/*
|----------------------------------------------------------------------------------------
|                                  UPDATE METHOD
|----------------------------------------------------------------------------------------
*/
    public function update(Request $request, $id)
    {
        // Validation portion
        $request->validate([
            '*'             => 'required'
        ], [
            '*.required'    => 'This field is required'
        ]);

        // Update portion
        Faq::find($id)->update([
            'question'      => $request->question,
            'answer'        => $request->answer,
            'updated_at'    => Carbon::now(),
        ]);

        return back()->with('success', 'Successfully updated your faq');
    }





/*
|----------------------------------------------------------------------------------------
|                                  DESTROY METHOD
|----------------------------------------------------------------------------------------
*/
    public function destroy($id)
    {
        Faq::find($id)->delete();
        return back()->with('success', 'Successfully deleted your faq');
    }
}
