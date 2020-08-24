<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Events\MyEvent;
use App\Events\EventSend;
// use pimax\FbBotApp;
// use pimax\Messages\Message;
use Illuminate\Support\Facades\Input;


class WebhookController extends Controller
{
    public function index(Request $request){
        $my_verify_token = env('WEBHOOK_VERIFY_TOKEN');

        $challange = Input::get('hub_challenge');
        $verify_token = Input::get('hub_verify_token');

        if($my_verify_token === $verify_token){
            echo $challange;
            exit;
        }

        // $access_token = "EAAD9Fu2Q6iIBAGr3F3c0r2fhFqWCXCTc8i5YyiSwZAODfESI4jgAhVT5xWlPCAkLGKZCyTojgXdq0KTlV2XfYs2IHSR9LydkBXMud2IyoscK1mHW1aiGQmPDVAZBeSsZAEEhimxTu66w7KYw71dEcY9kc0FpOmVra1v8Ck9ZBwgZDZD";

        $data = $request->getContent();
        // 

        // Storage::disk('local')->put('data.txt', $data);

        $json = json_decode($data, true);
        // \Log::info($json);
        if(isset($json['entry'][0]['messaging'])){
            $check = event(new MyEvent($json));
        }
        // echo $access_token;

        // $response = file_get_contents("php://input");

        // Storage::disk('local')->put('file.txt', "asda ".$response);
        // file_put_content(public_path()."/text.txt", $response);

    }

    public function pusher(){
        return view('pusher');
    }

    public function sendPusher(Request $request){
        // echo "terkirim";
        $check = event(new EventSend($request->getContent()));
        // dd($check);

        return response()->json('Success');
        
    }
}
