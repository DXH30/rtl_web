<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getData(Request $request) {
        return response()->json(Data::get());
    } 

    public function postData(Request $request) {
        $request->only(array(
            'user_id',
            'long',
            'lat'
        ));
        $data = new Data;
        $data->user_id = $request->input('user_id');
        $data->long = $request->input('long');
        $data->lat = $request->input('lat');
        $save = $data->save();
        // Mengirim data no_hp, long, lat ke wapulsa
        $send = array(
            'no_hp' => $data->user->no_hp,
            'lat' => $data->lat,
            'long' => $data->long
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://wapulsa.com/RTL/update_lokasi.php");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        if ($save) {
            $response = array(
                'msg' => 'Sukses input data',
                'status' => true
            );
        } else {
            $response = array(
                'msg' => 'Gagal input data',
                'status' => false
            );
        }
        return response()->json($response);
    }
}
