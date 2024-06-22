<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use stdClass;

class FeedbackController extends Controller
{

    public function __construct()
    {
        $this->section = new \stdClass();
        $this->section->title = "Feedbacks";
        $this->section->heading = "Feedbacks";
        $this->section->slug = "feedbacks";
        $this->section->folder = "feedbacks";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if ($request->header('Accept') == 'application/json') {
            // API request
            return response()->json(['message' => 'Feedback Data', 'data' =>feedback::all()]);
        } 
        $section = $this->section;
        $feedbacks = Feedback::with('adsdata.modelData','adsdata.brandData','adsdata.yearData')->get();
        return view($section->folder . ".index", compact("feedbacks", "section"));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        // dd($id);
        $section = $this->section;
        $section->title = "Feedbacks";
        $section->heading = "Feedbacks";
        $section->method = 'POST';
        $section->route = [$section->slug . '.store', $id];
        // $feedbacks = Feedback::where('id', $id)->first();
        $feedbacks =[];
        $ad = Ads::where('id', $id)->first();
        return view($section->slug . '.form', compact("feedbacks", "section","ad"), ['id' => $id]);
    }


    // public function create()
    // {
    //     $section =  $this->section;
    //     $feedback = [];
    //     $section->title = "Feedbacks";
    //     $section->heading = "Feedbacks";
    //     $section->method = 'POST';
    //     return view($section->folder . ".form", compact("feedback", "section"));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            "title" => "Title Name is required.",
            "description" => "Description is required.",
        ];

        $validator = Validator::make($request->all(), [
            "title" => "required|string",
            "description" => "required|string",
        ], $messages);

        if ($validator->fails()) {
            if ($request->header('Accept') == 'application/json') {
                $data['code']=400;
                $data['message']=$validator->errors()->first();
                return response()->json($data);
            } else {
                // If it's a web request, redirect back with validation errors
                return redirect()->back()->withInput($request->input())->withErrors($validator);
            }
        }
        else{
            // $feedbacks = Feedback::create($request->all());
            if ($request->header('Accept') == 'application/json') {
                $data['code']=200;
                $data['message']='Successfully created';
                $data['data'] =   $feedbacks;
                return response()->json($data);
            } 

        // if (Auth::check()) {
            $feedback = Feedback::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'ad_id' =>  $request->input('ad_id'),
            ]);
            $adId = $feedback->ad_id;
            Session::flash('alert-success', 'Record has been added successfully');
            return redirect()->route('feedbacks.show', $adId);

        // }
    }
}
public function destroy($id)
{

    $year = Feedback::where('id', $id)->first();
    $section = $this->section;
    $year->delete();
    request()->session()->flash('alert-success', 'Record has been deleted successfully.');
    return redirect()->route($section->slug.'.index');
}
}