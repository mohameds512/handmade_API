<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FirebaseController extends Controller
{
    public function sendNotification() {

        $server_key_API = 'AAAA263t9AE:APA91bEGqSy2CLLsTSmHsogRCS58aZVPCq_v2GO9MZSCmLGNxDck3lxMuq7VGwiSBxyB2LJmv0f55RGvPfcp5mNVeRux3d36syt5HmAOU0D5AEHzyhNo04_t7TOAd5hWJcd89QnAc7Ek';

        $device_token = 'fK17kiIRRRqAdMqtWEn67x:APA91bELvJOtdPHIdnJHyH6aptKm4VsKk9Ix4LBken_Dhme40pEkV3rtxjqSn8qW_88XgGwteCQEbJTigKAYXJEEilXq5h5uVTducuC1GC1fHzy53Gmwi0h_u4sJS0rfsmtFpa_8JbS3';

        $data = [
            "registration_ids" => [
                $device_token
            ],
            "notification" => [
                "title" => 'بسم الله',
                "body" => 'الحمد لله  تم بحمد الله',
                "sound" => 'default',
            ]
        ];

        $dataString = json_encode($data);

        $headers = [
            'Authorization: key='.$server_key_API,
            'Content-Type: application/json',
        ];

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);

        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);

        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        curl_setopt($ch,CURLOPT_POSTFIELDS,$dataString);

        curl_setopt($ch,CURLOPT_POSTFIELDS,$dataString);

        $response = curl_exec($ch);

        dd($response);
    }
}
