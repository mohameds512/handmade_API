<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Notifications\WelcomeMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

use PHPUnit\Util\Test;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function test()
    {
        return 'test';
    }
    public function profile()
    {
        $user = Auth::user();

    //    Mail::to($user->email)->send(new TestMail($user->name));

   //     dd('hi');

//        if ($user->roles->first()->name == 'delivery'){
//            $alltasks = $user->taskson->count();
//            $donetasks = $user->taskson->where('done_at')->count();
//        }else{
//            $allTasks = $user->tasks->count();
//            $doneTasks = $user->tasks->whereNotNull('done_at')->count();
 //       }
        //      dd($donetasks);

//        $allOrders = $user->orders->count();
//        $doneOrders = $user->orders->where('status_id','6')->count();


        return view('admin.profile.index', compact('user'));
    }
    public function profileEdit()
    {
        $user = Auth::user();

        return view('admin.profile.edit', compact('user'));
    }
    public function profileUpdate(Request $request)
    {
        //  dd($request->all());
        $user = Auth::user();

        $this->validate($request,[
            'name'=>'required',
            'bio'=> '',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'address'=> '',
            'area'=> '',
            'state'=> 'required',
            'profile_photo'=> 'image',
            'url'=> '',
        ]);

        $input = $request->all();

        $path = 'uploads/profiles/photos';
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }

        if(! isset($input['profile_photo'])){
            $photoPath  = $user->profile->photo;
        }else {
            if(File::exists(storage_path().'/app/public/'.$user->profile->profile_photo)){
                //dd('found');
                File::delete(storage_path().'/app/public/'.$user->profile->profile_photo);
            }
            $photoPath =  $input['profile_photo']->store($path,'public');
            $user->profile->profile_photo = $photoPath;

        }
        //    dd($photoPath);
        if($input['bio']){
            $user->profile->bio = $input['bio'];
        }
        if($input['address']){
            $user->profile->address = $input['address'];
        }
        if($input['area']){
            $user->profile->area = $input['area'];
        }
        if($input['url']){
            $user->profile->url = $input['url'];
        }

        $user->push();
        notify()->success('Profile Updated Successfully','Profile Updated');
        return redirect()->route('admin.profile');
    }

    public function notifications()
    {
        $user =  \auth()->user();
        $user->notify(new WelcomeMessage());
        //$user->notify(new WelcomeMessage());

        $notifications = $user->notifications;

        return view('notifications',compact('notifications'));
    }
}
