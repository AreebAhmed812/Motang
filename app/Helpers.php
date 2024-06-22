<?php

use App\Models\Permission;
use App\Models\RolePermission;
use App\Models\Attachment;
use App\Models\Ads;

if (! function_exists('getUserPermissions')){

function getUserPermissions(){
    if(auth()->user()->user_type > 3) {
    return RolePermission::where('role_id', auth()->user()->user_type)->pluck('permission_id')->toArray();
    }
    else{
        return Permission::pluck('name')->toArray();
    }
}
}

function checkPermission($value){
    if(auth()->user()->user_type != 3) {
        if (!in_array($value, getUserPermissions()))
        {
            return abort('403');
        }
    }
}
if (! function_exists('getImageURL')){
    function getImageURL($imageIds)
    {
        $ids = explode(",", $imageIds);
        foreach($ids as $id){
            $data = Attachment::where('id', $id)->first();
        return ($data) ? 'attachments'.'/'.$data->name: '';
        }

    }
}

if (! function_exists('getMultiImageLink')){
    function getMultiImageLink($attachment_id){
        $file_ids = explode(',', $attachment_id);
        $attachments = Attachment::whereIn('id',$file_ids)->get();
        $imageLink = [];
        if($attachments->count() > 0){
            foreach($attachments as $image)
            {
                $imageLink[] = asset('attachments').'//'.$image->name;
            }

        }else{
            $imageLink[] = asset('attachments/800x600.png');
        }
        return $imageLink;
    }
 }

 if (! function_exists('getFilesGalary')){
    function getFilesGalary($attachment_id){
        $file_ids = explode(',', $attachment_id);
        $attachments = Attachment::whereIn('id',$file_ids)->get();
        $html = '<div class="nk-block"><div class="row g-gs">';
        foreach($attachments as $attachment){
            $exploded = explode('.', $attachment->name);
            $file_name = substr($attachment->name, 0, strrpos($attachment->name, "."));
            $file_ext = strtolower(end($exploded));
            if ($attachment->name) {
                $html .= '<div class="col-sm-6 col-lg-4"><div class="gallery gallery-content card card-bordered" data-toggle="tooltip" data-placement="top" title="'.$file_name.'"><a class="download" target="_blank" href="'.asset('attachments/'.$attachment->name).'"><img src="'.asset('attachments/'.$attachment->name).'"></a></div></div>';
            }
        }
        $html .= '</div></div>';
        return $html;
    }
}

if (! function_exists('getrelatedads')){
    function getrelatedads($user_id){
      return Ads::where('user_id',$user_id)->with('brandData')->get();
    }
}
function formatToHumanView($input)
{
    // Replace underscores or hyphens with spaces
    $formatted = str_replace(['_', '-'], ' ', $input);

    // Capitalize the first letter of each word
    $formatted = ucwords($formatted);

    return $formatted;
}
