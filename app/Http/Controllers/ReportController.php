<?php

namespace App\Http\Controllers;

use App\Models\Report;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\UserController;
use App\Models\Ads;
use stdClass;

class ReportController extends Controller {
    public function __construct() {
        $this->section = new \stdClass();
        $this->section->title = 'Reports';
        $this->section->heading = 'Reports';
        $this->section->slug = 'reports';
        $this->section->folder = 'reports';
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index(Request $request) {
        if ($request->header('Accept') == 'application/json') {
            // API request
            return response()->json(['message' => 'Reports Data', 'data' =>Report::all()]);
        } 
        $reports = Report::
        with('adsdata','adsdata.user')->get();
        // dd($reports);
        $section = $this->section;
        // dd($request);
        // $reports = Report::all();
        return view( $section->slug.'.index', compact( 'reports', 'section' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    // public function create() {
    //     $section = $this->section;
    //     $report = [];
    //     $section->title = 'Add Report';
    //     $section->heading = 'Reports';
    //     $section->method = 'POST';
    //     $section->slug = $section->slug.'.store';
    //     return view( $section->slug.'.form', compact( 'report', 'section' ) );
    // }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
       
        $messages = [
            "report" => "Report is required",
            "description" => "Description is required",
        ];
        $validator = Validator::make( $request->all(), [
            "report"=> "required|string",
            "description"=> "required|string",
        ], $messages );

        if ( $validator->fails() ) {
            return redirect()->back()->withInput($request->input())->withErrors($validator);
        }
        // if ( Auth::check() ) {
            $report = Report::create( [
                'report' => $request->input( 'report' ),
                'description' => $request->input( 'description' ),
                'ad_id' => $request->input( 'ad_id' ),
            ]);
        // }
        if ($request->header('Accept') == 'application/json') {
            $data['code']=200;
            $data['message']='Successfully created';
            $data['data'] =   $report;
            
            return response()->json($data);
        } 
        Session::flash('alert-success', 'Record has been added successfully');
        return redirect()->back();
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        $section = $this->section;
        $section->title = "Reports";
        $section->heading = "Reports";
        $section->method = 'POST';
        $section->route = [$section->slug . '.store', $id];
        // $reports = Report::where('id', $id)->first();
        $reports = [];
        $ad = Ads::where('id', $id)->first();
        return view($section->slug . '.form', compact("reports", "section",'ad'), ['id' => $id]);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy(Request $request, $id ) {
        $report = Report::find($id);
        if ($request->header('Accept') == 'application/json') {
            // if ($request->is('api/*') || $request->wantsJson()) {
                if($id){
                    $report->delete();
                    $data['code']=200;
                    $data['message']='Successfully deleted';
                 
                    return response()->json($data);
                }
                else{
                $data['code']=400;
                $data['message']='Something went wrong';
                return response()->json($data);
                }
                // return response()->json($data);
            } 
       
        if(!$report)
        {
            return redirect()->back();
        }
        $report->delete();
        Session::flash('alert-danger', 'Record has been deleted successfully');
        return redirect()->back();
    }
}
