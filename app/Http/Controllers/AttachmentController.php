<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Http\Requests\StoreAttachmentRequest;
use App\Http\Requests\UpdateAttachmentRequest;

use Illuminate\Http\Request;

class AttachmentController extends Controller
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
    public function index()
    {
        $section = $this->section;
        $attachments = Attachment::all();
        return view($section->folder . ".index", compact("attachments", "section"));
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
     * @param  \App\Http\Requests\StoreAttachmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttachmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function show(Attachment $attachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function edit(Attachment $attachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttachmentRequest  $request
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttachmentRequest $request, Attachment $attachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attachment $attachment)
    {
        //
    }
    public function addNewAttachment(Request $request)
    {
        if($request->has('attachments')){
            $lastIds = [];
            
            if(is_array($request->attachments)){
                foreach ($request->attachments as $key => $attachment){
                
                    $data =   Attachment::create([
                            'name' => time().'_'.$attachment->getClientOriginalName(),
                            'type' => $attachment->getMimeType()
                        ]);
                        $lastIds[$key] = $data->id;
                        $attachment->move(public_path('attachments'),$data->name);
                    }
                }else{
                    // dd($request->attachments);
                    $data =   Attachment::create([
                    'name' => time().'_'.$request->attachments->getClientOriginalName(),
                    'type' => $request->attachments->getMimeType()
                ]);
                $lastIds = $data->id;
                $request->attachments->move(public_path('attachments'),$data->name);
                }

        return $lastIds;
    }
    return null;
    }

    public function addIconAttachment(Request $request)
    {
        if($request->has('icon')){
                $lastIds = [];
                if(is_array($request->icon)){
                    foreach ($request->icon as $key => $attachment){
                    
                        $data =   Attachment::create([
                            'name' => time().'_'.$attachment->getClientOriginalName(),
                            'type' => $attachment->getMimeType()
                        ]);
                        $lastIds[$key] = $data->id;
                        $attachment->move(public_path('attachments'),$data->name);
                    }
                }else{
                    $data =   Attachment::create([
                        'name' => time().'_'.$request->icon->getClientOriginalName(),
                        'type' => $request->icon->getMimeType()
                    ]);
                    $lastIds = $data->id;
                    $request->icon->move(public_path('attachments'),$data->name);
                }
                
            return $lastIds;
            }
            return null;
    }
}
