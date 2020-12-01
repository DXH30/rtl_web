<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
            $user->no_hp = $request->input('no_hp');
            $user->password = $request->has('password') ? Hash::make($request->input('password')) : Hash::make('rtltruck1234');
            $user->email = $request->input('email');
            $user->save();

            $data = new Driver;
            $data->user_id = $user->id;
            $data->id_driver = $request->input('id_driver'); 
            $data->no_ktp = $request->input('no_ktp');
            $data->no_sim = $request->input('no_sim');
            $data->tipe_armada = $request->input('tipe_armada');
            $data->no_polisi = $request->input('no_polisi');
            $data->no_rekening = $request->input('no_rekening');
            $data->nama_bank = $request->input('nama_bank');
            $data->nama_holder = $request->input('nama_holder');
            $data->regional = $request->input('regional');

            $data->foto_sim = "empty.png";
            $data->foto_ktp = "empty.png";
            $data->foto_driver = "empty.png";
            $data->foto_armada = "empty.png";
            $data->save();
            $response = array(
                'status' => true,
                'msg' => 'Data driver berhasil tersimpan'
            );
            return response()->json($response);
        } else {
            $response = array(
                'status' => false,
                'msg' => 'Data driver harus di post'
            );
            return response()->json($response);
        }
    }

    public function delete(Request $request) {
        $id = $request->input('id');
        User::find($id)->delete();
        $response = array(
            'status' => true,
            'msg' => 'Data driver sudah dihapus'
        );
        return response()->json($response);
    }

    public function list(Request $request) {
        $obj = array(
            'drivers' => Driver::get() 
        );
        $response = array(
            'status' => true,
            'msg' => 'Under maintenance'
        );
        return response()->json($response);
    }

    public function update(Request $request) {
        $response = array(
            'status' => true,
            'msg' => 'Under maintenance'
        );

        if ($request->isMethod('post')) {
            return response()->json($response);
        } else {
            return response()->json($response);
        }
    }
}
