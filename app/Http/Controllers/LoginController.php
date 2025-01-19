<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\KatalogProduk;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request) {
        // dd($request);
        $request->validate([
            'email' => 'required',
            'password'=> 'required' 
         ], [
            'email.required' => 'Kolom Email tidak boleh kosong.',
            'password.required' => 'Kolom Password tidak boleh kosong.',
        ]);


         if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            
            if ($user->role === 'admin' || $user->role === 'penyembelih') {
                return redirect('/dashboard');
            } else {
                return redirect('/')->with('wrong', 'Role tidak Ditemukan !');
            }
        } else {
            return redirect('/login')->with('wrong', 'Email dan password tidak tersedia');
        }
    }

    public function logout() {
        if (Auth::check()) {
            $role = Auth::user()->role;
    
           if ($role === 'admin' || $role === 'penyembelih') {
                Auth::logout();
                return redirect('/login');
            } else {
                Auth::logout();
                return redirect('/');
            }
        } 
 
    }

    public function register(Request $request) {
        $request->validate([
             'nama' => 'required', 
             'email' => 'required|email|unique:users,email',
             'password' => 'required', 
             'alamat' => 'required',
             'no_telepon' => 'required',
         ]);
        $user=new User();
        $user->nama=$request->nama;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->alamat=$request->alamat;
        $user->no_telepon=$request->no_telepon;
        $user->role='customer';
        if ($user->save()) {
            return redirect("/login")->with("sukses","Data User Berhasil Disimpan");
        } else {
            return redirect()->back();
        }
    }

}
