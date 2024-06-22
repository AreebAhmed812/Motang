<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ads;
use App\Models\User;
class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function signUp()
    {
        return view('userlogin/register');
    }
    public function signUpUser(Request $request)
    {
        dd($request);
        $validationMessages = [
            'name.unique' => 'User name already exist. Please enter a unique username',
        ];
        // validate user input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:users,name',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:6|confirmed',
            'user_type' => 'required',
            'status' => 'required|string'
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
        } else {
            $plain_pass = $request->password;
            $request->request->add([
                'password'=>bcrypt($request->password),
                'birth_date'=> Carbon::now()->format('Y-m-d')
            ]);
            if(User::where('email',$request->email)->first()){
                return response([
                    'message' =>"Already Exists",
                    'status' => 'failed'
                ],401);
            }
            if($request->has('image')){
                // Picture Upload process
                // $image = $request->file('image');
                $imageName = strtolower($request->name).'.'.$request->image->extension();
                $request->image->move(public_path('pictures'), $imageName);
                $request->request->add(['picture'=> $imageName]);
            }
            $user = User::create($request->all());
            if ($request->header('Accept') == 'application/json') {
                $data['code']=200;
                $data['message']='Successfully created';
                $data['data'] =   $user;
                return response()->json($data);
            }
            $extra = [
                'plain_password' => $plain_pass,
                'url' => env('APP_URL')
            ];
            $merge = array_merge($user->toArray(),$extra);
            // Mail::to($user->email)->send(new SendCredentials($merge));
            $request->session()->flash('flash_message', 'Record has been added successfully.');
            return redirect()->route($section->slug.'.index');
            // return response([
            //     'message' => "Successfully added",
            //     'status' => 'success',
            // ],200);
        }
    }
    public function user()
    {
        //
        return view('userlogin.login');
    }
    public function userLogin(Request $request)
    {
        // dd($request);
        $adminLogin= User::where('email', $request->email)->first();
        if(($adminLogin) && $adminLogin->status == 0){
        return redirect()->back()->withInput()->withErrors(['customError' => "Please contact with admin You are not allowed to login"]);
       }
        if (!$adminLogin || $adminLogin->user_type == 0 || $adminLogin->user_type == 1 || $adminLogin->user_type == 2) {
            return redirect()->back()->withInput()->withErrors(['customError' => "You don't have access to this"]);
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed
            return redirect()->intended('/dashboard');
        }
        return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);
    }
    public function admin()
    {
        //
        return view('admin.login');
    }
   public function adminLogin(Request $request)
    {
        $adminLogin= User::where('email', $request->email)->first();
        if(($adminLogin) && $adminLogin->status == 0){
            return redirect()->back()->withInput()->withErrors(['customError' => "Please contact with admin You are not allowed to login"]);
           }
        if (!$adminLogin || $adminLogin->user_type == 3) {
            return redirect()->back()->withInput()->withErrors(['customError' => "You don't have access to this"]);
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed
            return redirect()->intended('/dashboard');
        }
        return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);

    }
    public function list()
    {
        $ads = ads::with('modelData', 'brandData', 'yearData', 'user')->Where('status',1)->paginate(10);
        return view('listing-list-view',compact('ads'));
    }
    public function innerDetail()
    {
        return view('inner-product');
    }
    public function feedback()
    {
        return view('feedback');
    }
    public function report()
    {
        return view('report');
    }
    public function contact()
    {
        return view('contact');
    }
    public function termsConditions()
    {
        return view('terms-and-condition');
    }
    public function privacyPolicy()
    {
        return view('privacy-policy');
    }
    public function aboutUs()
    {
        return view('about-us');
    }

    public function search(Request $request)
    {


        $ads = ads::with('modelData', 'brandData', 'yearData', 'user')->Where('status',1)->get();
        $search = Ads::when($request->filled('search'), function ($query) use ($request) {
                $query->where('color', 'LIKE', '%' . $request->search . '%');
            })
            ->when($request->filled('doors'), function ($query) use ($request) {
                $query->where('doors', 'LIKE', '%' . $request->doors . '%');
            })
            ->when($request->filled('registered'), function ($query) use ($request) {
                $query->where('car_registered', 'LIKE', '%' . $request->registered . '%');
            })

            ->when($request->filled('fuel'), function ($query) use ($request) {
                $query->where('fuel', 'LIKE', '%' . $request->fuel . '%');
            })
            ->when($request->filled('location'), function ($query) use ($request) {
                $query->where('location', 'LIKE', '%' . $request->location . '%');
            })
            ->when($request->filled('condition'), function ($query) use ($request) {
                $query->where('condition', 'LIKE', '%' . $request->condition . '%');
            })
            ->when($request->filled('transmission'), function ($query) use ($request) {
                $query->where('transmission', 'LIKE', '%' . $request->transmission . '%');
            })
            ->when($request->filled('year'), function ($query) use ($request) {
                $query->where('year_of_manufacture', 'LIKE', '%' . $request->year . '%');
            })
            ->when($request->filled('model'), function ($query) use ($request) {
                $query->where('model', 'LIKE', '%' . $request->model . '%');
            })
            ->when($request->filled('min_price') && $request->filled('max_price'), function ($query) use ($request) {
                $query->whereBetween('price', [(int)$request->min_price, (int)$request->max_price]);
            })

            ->latest()
            ->paginate(10);

            // dd( $request->year);
        return view('search', compact('search','ads'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
