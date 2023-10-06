<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\System\Invitation;
use App\Mail\verifyEmail;
use App\Mail\resetPassword;
use App\Models\User;
use App\Models\Devices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\System;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;

class AuthController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware('guest');
    }

    public function adminLogin(Request $request)
    {
        
        $valid = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|string'
            ]
        );
        $user = \App\Models\User::where('email', $valid['email'])->first();
        
        if (!$user || !Hash::check($valid['password'], $user->password)) {
            return \response(['status'=>'invalid_mail_password' ]);
        }

        $factory = (new Factory)->withServiceAccount([
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
            ] );

        $messaging = $factory->createMessaging();
        $messaging->subscribeToTopic("users",'cJs9RNbxc4m9gmYDmxB-qm:APA91bHObWmfwLxYyrrQxmlK6T_Ja-7mJW748DoQ60jswRCp3N7-seNznmiMe7f-q64XgNfNJi-JL41XiyMekBqzsKwwP8M4ahCW4pFIp2Z_DypVUecFxz9n-PN5o7PL_rUGu11Ccprw');
        
        // if (!canUserAccess('partner')) return error(System::HTTP_UNAUTHORIZED);
        // return $user->hasPermissionTo('partner', 'api');
        if(!$user->hasPermissionTo('partner', 'api')){
            return error(System::HTTP_UNAUTHORIZED);
        }

        $data = (object) [];
        $token = $user->createToken('app');
        $data = $user->data(true);
        $data->token = $token->accessToken;
        if($user->email_verified_at == null){
            return \response(['status'=>'verify_email' ]);
        }

        if($request->has('device_token')){
            $check = Devices::where('user_id',$user->id,)->where('device_token',$request->device_token)->first();
            if (empty($check)) {
                $device = new Devices();
                $device->user_id = $user->id;
                $device->device_token = $request->device_token;
                $device->save();
            }
            
        }

        return success($data);
    }
    
    public function login(Request $request)
    {
        $valid = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|string'
            ]
        );
        $user = \App\Models\User::where('email', $valid['email'])->first();

        if (!$user || !Hash::check($valid['password'], $user->password)) {
            return \response(['status'=>'invalid_mail_password' ]);
        }
        $data = (object) [];
        $token = $user->createToken('app');
        $data = $user->data(true);
        $data->token = $token->accessToken;
        if($user->email_verified_at == null){
            return \response(['status'=>'verify_email' ]);
        }

        if($request->has('device_token')){
            $check = Devices::where('user_id',$user->id,)->where('device_token',$request->device_token)->first();
            if (empty($check)) {
                $device = new Devices();
                $device->user_id = $user->id;
                $device->device_token = $request->device_token;
                $device->save();
            }
            
        }

        return success($data);
    }

    public function verifyCode(Request $request){
        
        $status = false;
        $user = User::where('email',$request->email)->first();
        
        if($user){
            $status = $request->verifycode == $user->verifycode ? true : false;
            
            if ($status) {
                // return $user;
                $period = now()->diffInMinutes($user->verifycode_at);
                $status = $period < 30 ? true : false ; 
                
            }
        }
        if ($status) {
            $user->email_verified_at = now();
            $user->save();
        }
        return response(['status'=>$status]);
    }

    
    public function reset_Password(Request $request) {
        $user = User::where('email',$request->email)->first();
        if ($user) {
            $user->password = bcrypt($request->password);
            $user->save();
            return success();
        }
        return \response(['status'=>false]);
    }
    
    public function forgetPassword(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if ($user ){
            $verifycode = random_int(100000 ,999999);
            $user->verifycode = $verifycode;
            $user->verifycode_at = now();
            $user->save();
            Mail::to($user->email)->send(new resetPassword($user->verifycode) );
            return \success();
        }
        return \response(['status'=>'invalid_email']);
    }
    public function register(Request $request)
    {
        $verifycode = random_int(100000 ,999999);
        $user =  \App\Models\User::create([
            'name' => $request->username,
            'email' => $request->email,
            'phone'=>$request->phone,
            'password' => bcrypt($request->password),
            'verifycode'=>$verifycode,
            'verifycode_at'=>now(),
        ]);
        
        $userRes = new UserResource($user);

        $token = $user->createToken('app') ;
        $data = (object) [];
        $token = $user->createToken('app');
        $data = $user->data(true);
        $data->token = $token->accessToken;
        // return $user;
        Mail::to($user->email)->send(new verifyEmail($user->verifycode) );
        
        return success($data);
    }

    public function verifyEmail(Request $request){
        return $request;
    }

    public function reg(Request $request)
    {
        $token = $request->get('invitation_token');
        if (!$token)  return error(404,'invitation token is required');
        $invitation = Invitation::where('invitation_token', $token)->first();
        if (!$invitation){
            return error(404,'invalid invitation token');
        }
        $exist = User::where('email', $invitation->email)->first();

        if ($invitation->registerd_at || $exist){
            return error(404,'invitation link already used');
        }
        $email = $invitation->email;
        //   dd($email);
        return success(['email' => $email]);
    }

    public function docs ()
    {
        $links = ['auth','roles','users','profile','dashboard'];
        $routes = (object) [];
        $routes->login = (object) [
            'name' =>  '/login',
            'methods' =>   (object) ['post'],
            'function' =>  'Api/AuthController@login',
            'params' =>   (object) [
                'email' => 'required|email',
                'password' => 'required'
            ],
            'response' => 201
        ];
        $routes->logout = (object) [
            'name' =>  '/users/logout',
            'methods' =>   (object) ['post'],
            'function' =>  'Api/DashboardController@logout',
            'params' =>   (object) [
            '-'=>'-'
            ],
            'response' => 201
        ];
        $routes->profile = (object) [
            'name' =>  '/profile',
            'methods' =>   (object) ['post'],
            'function' =>  'Api/DashboardController@profile',
            'params' =>   (object) [
                'name'=>'required|string',
                'bio'=> 'nullable|string',
                'email'=>'required|email',
                'phone'=>'required|numeric',
                'address'=> 'nullable|string',
                'area'=> 'nullable|string',
                'state'=> 'required',
                'profile_photo'=> 'nullable|image',
                'url'=> 'nullable|string',
            ],
            'response' => 200
        ];
        $routes->docs = (object) [
            'name' =>  '/docs',
            'methods' =>   (object) ['get'],
            'function' =>  'Api/AuthController@docs',
            'params' =>   (object) [

            ],
            'response' => 200
        ];
        $routes->invite = (object) [
            'name' =>  '/invite',
            'methods' =>   (object) ['post'],
            'function' =>  'Api\Hr\UsersController@process',
            'params' =>   (object) [
                'email' => 'required|email|unique:invitations|unique:users'
            ],
            'response' => 200
        ];
        $routes->reg = (object) [
            'name' =>  '/reg',
            'methods' =>   (object) ['post'],
            'function' =>  'Api\AuthController@reg',
            'params' =>   (object) [
                'invitation_token' => 'required'
            ],
            'response' => 200
        ];
        $routes->register = (object) [
            'name' =>  '/register',
            'methods' =>   (object) ['post'],
            'function' =>  'Api\AuthController@register',
            'params' =>   (object) [
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|confirmed',
                'password_confirmation' => 'required|string|asPassword'
            ],
            'response' => 201
        ];
        $routes->notifications = (object) [
            'name' =>  '/notifications',
            'methods' =>   (object) ['post'],
            'function' =>  'Api\DashboardController@notifications',
            'params' =>   (object) [
            ],
            'response' => 200
        ];
        $routes->unreadNotifications = (object) [
            'name' =>  '/unread-notifications',
            'methods' =>   (object) ['post'],
            'function' =>  'Api\DashboardController@unreadNotifications',
            'params' =>   (object) [
            ],
            'response' => 200
        ];
        $routes->notificationsRead = (object) [
            'name' =>  '/notifications/read',
            'methods' =>   (object) ['post'],
            'function' =>  'Api\DashboardController@markAsRead',
            'params' =>   (object) [
            ],
            'response' => 200
        ];

        return view('api/docs', compact('links','routes'));
    }
}
