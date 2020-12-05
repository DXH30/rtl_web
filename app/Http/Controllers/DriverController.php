<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Driver;
use App\Models\User;

class DriverController extends Controller
{
    public function create(Request $request) {
        if ($request->isMethod('POST')) {
            $user = new User;
            $user->id = Str::uuid();
            $user->name = $request->input('name');
            $no_hp = $request->input('no_hp');
            $no_hp = preg_replace('/^0/', '62', $no_hp);
            $user->no_hp = $no_hp;
            // $password = $request->input('password');
            $password = rand(11111,99999);
            $user->password = Hash::make($password);
            // $user->password = Hash::make('rtltruck1234');
            $user->email = $request->input('email');
            // Kirim password ke nomor telepon
            $send = array(
                'message' => "Selamat anda telah terdaftar dengan user : $no_hp, dan password anda adalah $password"
            );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://142.11.196.41:5016/chat/sendmessage/$no_hp");
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($send));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            $user->save();

            $data = new Driver;
            $data->user_id = $user->id;
            $data->id_driver = $request->input('id_driver'); 
            if ($request->has('foto_driver')) {
                $data->foto_driver = 'foto_driver-'.preg_replace('/\s+/', '_', $request->input('id_driver')).'.png';
                $foto_driver = $request->file('foto_driver');
                Storage::putFileAs('driver/', $foto_driver, $data->foto_driver);
            }
            
            $data->no_ktp = $request->input('no_ktp');
            if ($request->has('foto_ktp')) {
                $data->foto_ktp = 'foto_ktp-'.preg_replace('/\s+/', '_', $request->input('id_driver')).'.png';
                $foto_ktp = $request->file('foto_ktp');
                Storage::putFileAs('driver/', $foto_ktp, $data->foto_ktp);
            }

            $data->no_sim = $request->input('no_sim');
            if ($request->has('foto_sim')) {
                $data->foto_sim = 'foto_sim-'.preg_replace('/\s+/', '_', $request->input('id_driver')).'.png';
                $foto_sim = $request->file('foto_sim');
                Storage::putFileAs('driver/', $foto_sim, $data->foto_sim);
            }
            $data->tipe_armada = $request->input('tipe_armada');
            $data->no_polisi = $request->input('no_polisi');

            if ($request->has('foto_armada')) {
                $data->foto_armada = 'foto_armada-'.preg_replace('/\s+/', '_', $request->input('id_driver')).'.png';
                $foto_armada = $request->file('foto_armada');
                Storage::putFileAs('driver/', $foto_armada, $data->foto_armada);
            }
            $data->no_rekening = $request->input('no_rekening');
            $data->nama_bank = $request->input('nama_bank');
            $data->nama_holder = $request->input('nama_holder');
            $data->regional = $request->input('regional');
            $data->save();
            return redirect()->to('driver/create');
        } else {
            $obj = array(
                'drivers' => Driver::get(),
            );
            return view('driver.create', $obj);
        }
    }

    public function delete(Request $request) {
        $id = $request->input('id');
        User::find($id)->delete();
        return redirect()->to('driver/list');
    }

    public function list(Request $request) {
        $obj = array(
            'drivers' => Driver::get() 
        );
        return view('driver.list', $obj);
    }

    public function update(Request $request) {
        if ($request->isMethod('post')) {
        }
    }
}
