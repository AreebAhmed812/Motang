<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\ApiTest;
use App\Http\Requests\StoreApiTestRequest;
use App\Http\Requests\UpdateApiTestRequest;

class ApiTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->section = new \stdClass();
        $this->section->title = 'Attachments';
        $this->section->heading = 'Attachments';
        $this->section->slug = 'attachments';
        $this->section->folder = 'attachments';
    }
    public function apiControl(Request $request){
        // $parameterValue = $request->input('parameter_name');

        // Example: Return a JSON response
        // return $request;
        return response()->json(['message' => $request]);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApiTestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApiTestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ApiTest  $apiTest
     * @return \Illuminate\Http\Response
     */
    public function show(ApiTest $apiTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ApiTest  $apiTest
     * @return \Illuminate\Http\Response
     */
    public function edit(ApiTest $apiTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApiTestRequest  $request
     * @param  \App\Models\ApiTest  $apiTest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApiTestRequest $request, ApiTest $apiTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ApiTest  $apiTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApiTest $apiTest)
    {
        //
    }
}
