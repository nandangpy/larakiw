<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('pages.auth.register');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'nama_lengkap' => 'required|max:255',
            'email_anda' => 'required|email:rfc,dns|unique:App\Models\User,email',
            'password_anda' => 'required|max:255|min:5',
            // 'nohp' => 'required|digits_between:10,13|numeric',
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            // dd($request->all());
            $user = new User();
            $user->email = $request->get('email_anda');
            $user->password = Hash::make($request->get('password_anda'));
            $user->name = $request->get('nama_lengkap');
            $user->role = 0;
            $user->save();
            return redirect('/home')->with('success', 'Berhasil Daftar!!');
        }
    }
}
