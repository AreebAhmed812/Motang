<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummypostController extends Controller
{
    //
    public function dummypost(Request $request){
        return response($request->all());
        // return response([
        //     'message' =>'luqman'. $request
        // ], 401);
        // ->json('luqman'.$request);
    }
}
