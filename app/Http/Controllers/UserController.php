<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use File;
use Illuminate\Support\Facades\Storage;
use App\Job;
use App\User;
use Carbon\Carbon;
use App\Application;
use Image;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function show($name)
    {
        $user=User::where('name',$name)->first();


        $jobs=Job:: where([['user_id',$user->id],['application_id',null],['due','>',Carbon::now()]])->latest()->paginate(5);
        return view('users.show',compact('jobs','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {

        return view('users.editprofile')->with('user',Auth::user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'user_type'=>'required',
            'id_no' => 'required|min:6|max:10',
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email,'.$user->id,
            'phone' => 'required|min:10|max:10',
            'gender' => 'required|min:4|max:6',
            'dob' => 'required|date',
            'location' => 'required|max:255',
            'address' => 'required|max:255',
            'avatar.*'=>'sometimes|mimes:jpeg,png,jpg|max:2048|nullable',
            'highest_education' =>'nullable|max:255',
            'other_education'=>'nullable|max:255',
            'experience'=>'nullable|max:255',
            'skills'=>'nullable|max:255',
            'cv.*'=>'sometimes|file|max:5000|mimes:pdf,docx,doc',
// $destination = 'image/profile'.$user->image;
// if(file::exists($destination)){
//     File::deletes($destination);
// }

        ]);
        $user=Auth()->user();
        $user->user_type =$request->user_type;
        $user->id_no = $request ->id_no;
        $user->name= $request -> name;
        $user->email = $request -> email;
        $user->phone =$request -> phone;
        $user->gender =$request ->gender;
        $user->dob =$request ->dob;
        $user->location =$request ->location;
        $user->address =$request ->address;
        $user->highest_education =$request ->highest_education;
        $user->other_education =$request ->other_education;
        $user-> experience =$request ->experience;
        $user->skills =$request ->skills;


        if(request()->hasFile('avatar')){

            $file_path = 'images/profile/'.$user->avatar;
            if(file::exists($file_path)){
                @unlink($file_path);
                }

            $file=request()->file('avatar');

            $name=uniqid($user->id."_").".".$file->getClientOriginalExtension();

            $file->move('images/profile/',$name);

            $user-> avatar=$name;
        }

        if(request()->hasFile('cv')){
            $files=request()->file('cv');
            foreach($files as $file){
            $cv=uniqid($user->id."_").".".$file->getClientOriginalExtension();
            $file->move('files/certificates/',$cv);
            $user-> cv_and_certificates=$cv;
            }
        }

        $user->update();

         return redirect()->back()->with('success','Your Profile has been Updated');

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
    public function profile()
    {
    $user=Auth::user();
    return view('users.myprofile')->with('user',$user);
    }

    public function applicant($name){
        $user=User::where('name',$name)->first();
        $application=Application::where('user_id',$user->id)->get();
        return view('users.applicant',compact('application','user'));
    }

}

