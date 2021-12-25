<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function registrasiAction(Request $request)
    {
        $validated = $request->validate([
            'ktp' => 'required|min:10|unique:pasien,no_identitas',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required|min:10|numeric',
            'email' => 'required',
            'username' => 'required|min:5|unique:users,username',
            'password' => 'required',
            're_password' => 'same:password',
        ]);


        $ktp            = $validated['ktp'];
        $nama_lengkap   = $validated['nama_lengkap'];
        $jenis_kelamin  = $validated['jenis_kelamin'];
        $alamat         = $validated['alamat'];
        $tempat_lahir   = $validated['tempat_lahir'];
        $tgl_lahir      = $validated['tgl_lahir'];
        $no_hp          = $validated['no_hp'];
        $email          = $validated['email'];
        $username       = $validated['username'];
        $password       = md5($request->password);

        $id = Pasien::insertGetId([
            'created_by' => 1,
            'created_at' => now(),
            'nama_pasien' => $nama_lengkap,
            'no_identitas' => $ktp,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'email' => $email,
            'tgl_lahir' => $tgl_lahir,
            'tempat_lahir' => $tempat_lahir,
            'jenis_kelamin' => $jenis_kelamin
        ]);

        $no_mr = sprintf("%08d", $id);

        Pasien::where('id', $id)->update([
            'no_mr' => $no_mr,
            'created_by' => $id 
        ]);

        $user = User::create([
            'created_by' => $id,
            'created_at' => now(),
            'fullname' => $nama_lengkap,
            'username' => $username,
            'password' => $password,
            'last_update_pass' => now()
        ]);

        return redirect()->route('login')->with('berhasil','User Berhasil Dibuat, Silahkan Login!');
    }

    public function checkUsername(Request $request)
    {
        $username = $request->username;

        $usernamenya = User::select('username')->where('username', $username)->first();

        // echo $usernamenya;
        
        if (!empty($usernamenya)) {
            $message = "<p style='color:red'>Username sudah digunakan, silahkan gunakan username lain!</p>";
            return response()->json(array('message'=> $message,'code' => '201'), 200);
        }else{
            $message = "<p style='color:green'>Username dapat digunakan!</p>";
            return response()->json(array('message'=> $message,'code' => '200'), 200);
        }
    }
}
