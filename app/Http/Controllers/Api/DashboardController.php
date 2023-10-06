<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = \auth()->user();
        return success($user,'','dashboard goes ere');
    }

    public function notifications()
    {
     //   $notifications = \auth()->user()->notifications();
        $user =  \auth()->user();
        $notifications = $user->notifications;
        return success($notifications);
    }

    public function markAsRead()
    {
        $user =  \auth()->user();
        $user->unreadNotifications->markAsRead();
        $notifications = $user->notifications;
        return success($notifications);
    }

    public function unreadNotifications()
    {
        $user =  \auth()->user();
        $notifications = $user->unreadNotifications();
        return success($notifications);
    }

    public function profile()
    {
        $profile = auth()->user()->profile;
        return success($profile);
    }

    public function profileUpdate(Request $request)
    {
        //  dd($request->all());
        $user = Auth::user();

        $this->validate($request,[
            'name'=>'required|string',
            'bio'=> 'nullable|string',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'address'=> 'nullable|string',
            'area'=> 'nullable|string',
            'state'=> 'required',
            'profile_photo'=> 'nullable|image',
            'url'=> 'nullable|string',
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

        return success($user->profile);

    }

    public function logout(Request $request )
    {
        $factory = (new Factory)->withServiceAccount(
            [
                "type"=> "service_account",
                "project_id"=> "antika-3c76f",
                "private_key_id"=> "dab7fc08103f1d5fb480c900acb96ac0e4b97fbe",
                "private_key"=> "-----BEGIN PRIVATE KEY-----\nMIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQC3eYiqlDpIWYbk\n5Q6mA6eZFmTAuiZHxWxzASjq792nzan3VMohx61siqm5VwCUiYgdI/UuDBgrE0oe\nAbi3bEYTIkYatpyRR8Rouzxr6Obl6zXaNKmUapooVlvm2210Bf52PdB3gKXf+mSn\nXkwTEE0OxG7tl8JyaSwu62MW5hiZzDnbE7VwzS7qAp4/WiD1IPHEpANySbT5aZQD\nB/VGi8PUJnB6XOo3IFugaBlfwIngVk9Wq8mLvL5sL1nvFPQh7SzvSvFcUWBCR4Hw\nIE0RivFUQhbOhbxd17zB45bvPgkYKPOCbUO81AO1ofn6QhZFSMeI4CaOIofVfiZg\nzHhGLwI1AgMBAAECggEAAvMHsOJIG5Cg2/4Yoa+OWqYjAXwckGvKhgC/RSOM9x0V\nvd2VkDxy+7sw5kNRRZH+Z6WD0/Uq0Epzlw7lBsHNUJJs+RH1a1pxfFOCMaPhTlHd\nIEBXd4TNLJfSy1+8nzBXelQdDUa6o+KVCqG37FiHPJUIyXX2kLtDFBABnEUfoR1B\n0Np0zezcsBtacugpKdAMNhE5OgAEL64uNmWFvp9MstFlSlIj+ZgXgJONfjOWZAA7\niFQ6I3Ii/Xl6YYQCkaWgi9cJWI8R+2SAR9uzXV/g0vaDRJN69NHza/BpXSxnk2Ny\n9zKF5B0qe3YLYl6jwWmWhmsezQJYlCU6cOXbumFsUwKBgQDxN85QP+8PCX0vo98F\nD7GHLCoaklM9+ypaWXQohZlOwYcSoktyEBXaRJx0e5dGSuakvaY0nEAjVVskYb23\n6j5p9B/85pGOw3MjZv7x3rEhjPHC8xFd7+FMl19e9eLSDKkpEFqdJOa5oIivZPsh\n6d1HGyo7Fw4smRAuDGfZHQ8azwKBgQDCt9wjXedUvKs0d5ygN0ZX+mu+ieHDu7KN\n9uplFEkCOhZJ3Y1y3vm3BUY4c6IDKtnZXDV16TkwYqcL4RSh/wQhB6mDMvHdxqPZ\nSNyIf/Gy5nUV/gWNnrTkGoTfvptObFQWGregPgDT1Q/aGF6d1iw3KaKrZz+14IBL\npdi+sUoDuwKBgQC4qy2i2F9vVqdlWoJ5wHr77j7Jmu5pjCjvhH5eK3GkDpsXE/LI\nfzILqO1Sa+/zG5KZ2qssqdacdlNRdhalf4qK2R/IIMic0FsMZmSVzRQ0iE/qHOZV\n0TjdxyF3dK1Se+jhjCijF8YfpJwgEyID46PJNS3OkScD06bEajDy0cFnlwKBgQCM\nm7JWw6+R7DABUkKDG4crbsUxMWYbLsYwZ9Y5KZ3TAtkne9px0fwnIqLjjvS2LtJj\neIeOXt0SSJryJBX/KST1KRBKkpY/nPqipE/ELgf+NRbly6p86tcbRN8gpwaFagqK\nb76b80orrdalmiVw+sCxENrLxWInVzet6NQMV//nkwKBgGWeYwkRupa30axeqMAn\nLsmDb8TdBQ8flb6G3hB5jEXzlT9F3oe/mWx0p66QEv5WqwXl5gLmA1V7K+C7LMeT\nenYc7xm5flsAbEr38jITPXWIJXx1HcjOjuqjBBnOY+HRZfGn3eEIJrvdt9Xasc7E\n2v8nEO2a5flzx3qqslj1ogdX\n-----END PRIVATE KEY-----\n",
                "client_email"=> "firebase-adminsdk-f1imy@antika-3c76f.iam.gserviceaccount.com",
                "client_id"=> "108087501636040819345",
                "auth_uri"=> "https://accounts.google.com/o/oauth2/auth",
                "token_uri"=> "https://oauth2.googleapis.com/token",
                "auth_provider_x509_cert_url"=> "https://www.googleapis.com/oauth2/v1/certs",
                "client_x509_cert_url"=> "https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-f1imy%40antika-3c76f.iam.gserviceaccount.com",
                "universe_domain"=> "googleapis.com"
            ] 
        );

        $messaging = $factory->createMessaging();
        $messaging->unsubscribeFromTopic("users",'cJs9RNbxc4m9gmYDmxB-qm:APA91bHObWmfwLxYyrrQxmlK6T_Ja-7mJW748DoQ60jswRCp3N7-seNznmiMe7f-q64XgNfNJi-JL41XiyMekBqzsKwwP8M4ahCW4pFIp2Z_DypVUecFxz9n-PN5o7PL_rUGu11Ccprw');
        
       // $request->user()->token()->revoke();

        $user = auth()->user();
        if ($user && $user->token()) {
            $token = $user->token();
            $token->revoke();
            $token->delete();
            //   Activity::log('user\logout', $user);
        }
        return success(['message'=>'logged out !']);
    }

}
