<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class whatsappApi extends Controller
{
    public function getMessage(Request $request){
        $data = json_decode($request, true);
        $device = $data['device'];
        $sender = $data['sender'];
        $message = $data['message'];
        $member= $data['member']; //group member who send the message
        $name = $data['name'];
        $location = $data['location'];
        //data below will only received by device with all feature package
        //start
        $url =  $data['url'];
        $filename =  $data['filename'];
        $extension=  $data['extension'];
        //end

        function sendFonnte($target, $data) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.fonnte.com/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array(
                    'target' => $target,
                    'message' => $data['message'],
                ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: 9m1A@QhnqmbTNb!EeyWU"
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            return $response;
        }

        if ( $message == "test" ) {
            $reply = [
                "message" => "working great!
                1. lskdhflaskhdlasdf
                2. dslkfjlaksjdsdf
                3. dlskfjlaksdjflaksjdf
                4. slkdfjlaksjdlkfjasdf
                5. lskdfjlashd;lkajhsdf
                
                Untuk lebih lengkap kunjungi https://ppdmaco.com",
            ];
        }else {
            $reply = [
                "message" => "Sorry, i don't understand. Please use one of the following keyword"
        ];
        }
        sendFonnte($sender, $reply);
    }
}
