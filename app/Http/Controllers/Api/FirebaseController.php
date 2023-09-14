<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Devices;
use App\Models\Notifications;

class FirebaseController extends Controller
{
    
    static function sendNotification($topic,$title,$body ,$pageId ,$pageName) {
        
        $server_key_API = 'AAAA263t9AE:APA91bEGqSy2CLLsTSmHsogRCS58aZVPCq_v2GO9MZSCmLGNxDck3lxMuq7VGwiSBxyB2LJmv0f55RGvPfcp5mNVeRux3d36syt5HmAOU0D5AEHzyhNo04_t7TOAd5hWJcd89QnAc7Ek';
        
        // $device = Devices::where('user_id',$user_id)->get('device_token')->first();

        
        // if (!empty($device)) {
            
            // $data = [
            //     "registration_ids" => [
            //         $device->device_token
            //     ],
            //     "notification" => [
            //         "title" => $title,
            //         "body" => $body,
            //         "sound" => 'default',
            //     ]
            // ];

            // $dataString = json_encode($data);

            $fields = [
                "to" =>  '/topics/'.$topic,
                'priority' => 'heigh',
                'content_available' => true,

                "notification" => [
                    "title" => $title,
                    "body" => $body,
                    "click_action" => "FLUTTER_NOTIFICATION_CLICK",
                    "sound" => 'default',
                ],

                "data" => [
                    "pageid" => $pageId,
                    "pagename" => $pageName,
                ]

            ];

            $dataString = json_encode($fields);


            $headers = [
                'Authorization: key='.$server_key_API,
                'Content-Type: application/json',
            ];

            $ch = \curl_init();
            curl_setopt($ch,CURLOPT_URL,'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch,CURLOPT_POST,true);
            curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);

            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);

            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

            curl_setopt($ch,CURLOPT_POSTFIELDS,$dataString);

            curl_setopt($ch,CURLOPT_POSTFIELDS,$dataString);

            $response = curl_exec($ch);
            
            dd($response);

        // }
        // $device_token = 'fK17kiIRRRqAdMqtWEn67x:APA91bELvJOtdPHIdnJHyH6aptKm4VsKk9Ix4LBken_Dhme40pEkV3rtxjqSn8qW_88XgGwteCQEbJTigKAYXJEEilXq5h5uVTducuC1GC1fHzy53Gmwi0h_u4sJS0rfsmtFpa_8JbS3';
    }
    

    // static function sendNotification($user_id,$title,$body) {
        
    //     $server_key_API = 'AAAA263t9AE:APA91bEGqSy2CLLsTSmHsogRCS58aZVPCq_v2GO9MZSCmLGNxDck3lxMuq7VGwiSBxyB2LJmv0f55RGvPfcp5mNVeRux3d36syt5HmAOU0D5AEHzyhNo04_t7TOAd5hWJcd89QnAc7Ek';
        
    //     $device = Devices::where('user_id',$user_id)->get('device_token')->first();
    //     if (!empty($device)) {
            
    //         $data = [
    //             "registration_ids" => [
    //                 $device->device_token
    //             ],
    //             "notification" => [
    //                 "title" => $title,
    //                 "body" => $body,
    //                 "sound" => 'default',
    //             ]
    //         ];

    //         $dataString = json_encode($data);

    //         $headers = [
    //             'Authorization: key='.$server_key_API,
    //             'Content-Type: application/json',
    //         ];

    //         $ch = \curl_init();
    //         curl_setopt($ch,CURLOPT_URL,'https://fcm.googleapis.com/fcm/send');
    //         curl_setopt($ch,CURLOPT_POST,true);
    //         curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);

    //         curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);

    //         curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    //         curl_setopt($ch,CURLOPT_POSTFIELDS,$dataString);

    //         curl_setopt($ch,CURLOPT_POSTFIELDS,$dataString);

    //         $response = curl_exec($ch);

    //         dd($response);

    //     }
    //     // $device_token = 'fK17kiIRRRqAdMqtWEn67x:APA91bELvJOtdPHIdnJHyH6aptKm4VsKk9Ix4LBken_Dhme40pEkV3rtxjqSn8qW_88XgGwteCQEbJTigKAYXJEEilXq5h5uVTducuC1GC1fHzy53Gmwi0h_u4sJS0rfsmtFpa_8JbS3';
    // }
    
}
