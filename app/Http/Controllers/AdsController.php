<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Attachment;
use App\Models\Year;
use App\Models\Brand;
use App\Models\User;
use App\Models\ModelManagements;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->section = new \stdClass();
        $this->section->title = 'Ads';
        $this->section->heading = 'Ads';
        $this->section->slug = 'ads';
        $this->section->folder = 'ads';
    }
   
    public function index(Request $request) 
    {
        if ($request->header('Accept') == 'application/json') {
            // API request
            return response()->json(['message' => 'Ads Data', 'data' =>ads::all()]);
        } 
        checkPermission('read-user');
        $section = $this->section;
        // $users = User::with('role')->get();
        $ads = ads::
        with('modelData', 'brandData', 'yearData', 'user')
        ->when(auth()->user()->user_type == '3', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })
        ->get();
       
        // dd($ads);
        return view($section->folder.'.index', compact('ads', 'section'));
    }
    public function create()
    {
        checkPermission('create-user');
        $ads = [];
        $section = $this->section;
        $section->heading = 'Ads';
        $section->title = 'Add Ads';
        $section->method = 'POST';
        $year_ads = Year::pluck('year',
        'id')->toArray();
        $brand = Brand::pluck('brand_name','id')->toArray();
        $modelManagements  = ModelManagements::pluck('model','id')->toArray();
        $section->route = $section->slug.'.store';
        // $roles = Role::pluck('name', 'id')->toArray();
        // dd($roles);
        return view($section->folder.'.form',compact('section', 'ads','year_ads','modelManagements','brand'));
    }
    public function store(Request $request)
    {
        // dd(count($request->file('attachments')));
      
        $section = $this->section;
        //define custom validation messages for validator
        $validationMessages = [
            'ads.unique' => 'Ads is already exist.',
            'attachments.required' => 'Upload Atleast Five images',
            
        ];
        $validator = Validator::make($request->all(), [
            'attachments' => 'required|array|min:5',
            'attachments.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120', // 2MB limit per file
            'make_brand' => 'required',
            'model' => 'required',
            'location' => 'required',
            'year_of_manufacture' => 'required',
            'color' => 'required',
            'condition' => 'required',
            'transmission' => 'required',
            'car_registered' => 'required',
            'fuel' => 'required',
            'seats' => 'required',
            'doors' => 'required',
            'price' => 'required',
            'price_negotiable' => 'required',
            'listed_by' => 'required',
            'phone_number' => 'required',
            'description' => 'required',

        ], $validationMessages);
        

        //validation fails
        if ($validator->fails()) {
            if ($request->header('Accept') == 'application/json') {
                $data['code']=400;
                $data['message']=$validator->errors()->first();
                return response()->json($data);
            } else {
                // If it's a web request, redirect back with validation errors
                return redirect()->back()->withInput($request->input())->withErrors($validator);
            }
        }else {
            $count = count($request->file('attachments'));
            if ($count < 5 || !$request->has('attachments')) {
                if ($request->header('Accept') == 'application/json') {
                    $data['code']=400;
                    $data['message']="You need to upload at least 5 attachments and provide images.";
                    return response()->json($data);
                } else{
                return redirect()->back()->with('error', "You need to upload at least 5 attachments and provide images.");
                }
            }
            $request->request->add(['user_id' => auth()->user()->id]);
            $ads = ads::create($request->all());
            $attachments = new AttachmentController();
            $attachments = $attachments->addNewAttachment($request);
            if (!is_null($attachments)) {
                ads::where('id',$ads->id)->update(['attachment_id'=>implode(',', $attachments)]);
            }
            if ($request->header('Accept') == 'application/json') {
                $data['code']=200;
                $data['message']='Successfully created';
                $data['data'] =   $ads;
                return response()->json($data);
            } 
                $request->session()->flash('alert-success', 'Record has been added successfully.');
                    return redirect()->route($section->slug.'.index');
                //   return 'Not Ajax!';
                return redirect()->route($section->slug.'.index');
            }
    }
    public function edit($id)
    {
        checkPermission('update-user');

        // $id = Crypt::decrypt($id);
      
        $section = $this->section;
        $section->heading = 'Ads';
        $section->title = 'Edit Ads';
        $section->method = 'PUT';
        $section->route = [$section->slug.'.update', $id];
        $brand = Brand::pluck('brand_name','id')->toArray();
        $year_ads = Year::pluck('year',
        'id')->toArray();
        
        $ads = ads::where('id',$id)->with('modelData','brandData','yearData','user')->first();
        $modelManagements  = ModelManagements::where('make_brand',$ads->make_brand)->pluck('model','id')->toArray();
  
        
        return view($section->folder.'.form', compact('ads', 'section','year_ads','modelManagements','brand'));
    }
    public function update(Request $request,$ads_id)
    {
        if($request->attachments){
        $count = count($request->file('attachments'));

        if ($count < 5 || !$request->has('attachments')) {
            if ($request->header('Accept') == 'application/json') {
                $data['code']=400;
                $data['message']="You need to upload at least 5 attachments and provide images.";
                return response()->json($data);
            } else{
            return redirect()->back()->with('error', "You need to upload at least 5 attachments and provide images.");
            }
        }
    }
        $ads = ads::where('id', $ads_id)->first();
     
        $section = $this->section;
        if($ads){
             //define custom validation messages for validator
             $validationMessages = [
            'ads.unique' => 'Ads is already exist.',
            
        ];
        $validationMessages = [
            'name.unique' => 'User name already exist. Please enter a unique username',
            'email.unique' => 'Email already exist. Please enter a unique email',
        ];
       
        // validate user input
        $validator = Validator::make($request->all(), [
        ], $validationMessages);
            
            if ($validator->fails()) {
                // If it's an API request, return JSON response
                if ($request->header('Accept') == 'application/json') {
                        return response()->json(['message' => $validator->errors()->first()], 422);
                    } else {
                        // If it's a web request, redirect back with validation errors
                        return redirect()->back()->withInput($request->input())->withErrors($validator);
                    }
            }
            if($request->has('images')){
                // Picture Upload process
                // $image = $request->file('image');
                $imageName = strtolower($request->name).'.'.$request->image->extension();
                $request->image->move(public_path('images-ads'), $imageName);
                $request->request->add(['images-ads'=> $imageName]);
            }

                // $request->request->add(['user_id' => auth()->user()->id]);
                $ads->update($request->all());
                $attachments = new AttachmentController();
                $attachments = $attachments->addNewAttachment($request);
                if (!is_null($attachments)) {
                    ads::where('id',$ads->id)->update(['attachment_id'=>implode(',', $attachments)]);
                }
                if ($request->header('Accept') == 'application/json') {
                    $data['code']=200;
                    $data['message']='Successfully Updated data';
                    $data['data'] =   $ads;
                    
                    return response()->json($data);
                } 

            $request->session()->flash('alert-success', 'Record has been updated successfully.');
            return redirect()->route($section->slug . '.index');

        }
    }
    public function destroy(Request $request,$ads)
    {
        // dd($ads);
        $ads = ads::where('id', $ads)->first();
        $section = $this->section;
        if ($request->header('Accept') == 'application/json') {
            if($ads){
                $ads->delete();
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
        $ads->delete();
        request()->session()->flash('alert-success', 'Record has been deleted successfully.');
        return redirect()->route($section->slug.'.index');
    }
    public function fetchAds()
    {
        $featureAd = ads::with('modelData', 'brandData', 'yearData', 'user')
    ->where('status', 1)
    ->where('feature_status', 'active')
    ->get();

$ads = ads::with('modelData', 'brandData', 'yearData', 'user')
    ->where('status', 1)
    ->get();

return view('/home', ['featureAd' => $featureAd, 'ads' => $ads]);

    }
    public function show(Ads $ad)
    {
        $ad->total_click += 1;
        $ad->update();
        return view('inner-product',['ad' => $ad]);
    }
    public function brandFetch(Request $request)
    {
        // dd($request->make_brand_id);
        $brandName = $request->input('brand_name');
        $brand = ModelManagements::where('make_brand', $brandName)->get();
        // dd($brand->model);
        // $modelManagements  = ModelManagements::pluck('model','id')->toArray();
    if ($brand) {
        // Get the models associated with the brand
        // $models = $brand->modelManagements->pluck('model', 'id')->toArray();
        // dd($brand);
        // Return the models as JSON response
        return response()->json($brand);
    } else {
        // Brand not found, return an empty response or appropriate message
        return response()->json([]);
    
    }
    }
    public function search(Request $request)
    {
        $searchQuery = $request->input('search');
        $ads = Ads::all(); // Assuming you have a Product model

        // Call the search function
        $searchResult = $this->searchProducts($ads, $searchQuery);

        // Return the search result to the view or handle it as needed
        return view('ads.index', ['ads' => $searchResult]);
    }

    private function searchProducts($ads, $searchQuery)
    {
        // Your search logic here
        // Filter the products based on the search query
        $filteredProducts = $ads->filter(function ($ads) use ($searchQuery) {
            return stripos($ads->name, $searchQuery) !== false;
        });

        return $filteredProducts;
    }
    public function blockAd($id)
    {
        $ad = Ads::find($id);
    
        if ($ad) {
            $ad->update(['status' => 0]);
            session()->flash('alert-success', 'Ad blocked successfully.');
        } else {
            session()->flash('alert-danger', 'Something went wrong.');
        }
    
        return redirect()->back();
    }
    public function makeFeature(Request $request)
    {
        $ad = Ads::where('id',$request->id)->first();
        // dd($request->id);
        if (($ad) && ($ad->is_feature == 1)) {
            if ($request->status == 'active') {
                // dd($ad);
                // If status is set to 'active', update feature_start_date and feature_end_date
                $ad->update([
                    'feature_status' => $request->status,
                    'feature_start_date' => now(), // Set to current date and time
                    'feature_end_date' => now()->addMonth(), // Add one month to the current date and time
                    // addDays(15) days to the current date and time
                    // addHours(10) hours to the current date and time
                    // addMinutes(10) minutes to the current date and time
                ]);
               
                session()->flash('alert-success', 'Feature updated successfully.');
            } else {
                // If status is set to 'inactive', clear feature_start_date and feature_end_date
                $ad->update([
                    'feature_status' => $request->status,
                    'feature_start_date' => null,
                    'feature_end_date' => null,
                ]);
                
                session()->flash('alert-success', 'Feature deactivated successfully.');
            }
        } else {
            session()->flash('alert-danger', 'This ad does not have a feature.');
        }
    
        return redirect()->back();
    }
    
    
    public function autoDeactiveFeature()
    {
        $ads = Ads::get();
    
        foreach ($ads as $value) {
            if ($value->feature_status == 'active' && Carbon::now()->greaterThan($value->feature_end_date)) {
                $updated = $value->update([
                    'feature_status' => 'expired',
                    'feature_start_date' => null,
                    'feature_end_date' => null,
                ]);
            }
        }
    }

}