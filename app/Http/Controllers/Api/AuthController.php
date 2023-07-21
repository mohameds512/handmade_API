<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\System\Invitation;
use App\Mail\verifyEmail;
use App\Mail\resetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware('guest');
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
