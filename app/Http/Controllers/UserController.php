<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        //untuk menampilkan data
        $no = 1;
        $user = User::all();
        return view('pages/admin/user/index',compact('user','no'));
    }

    public function create() {
        return view('pages.admin.user.create');
    }

    public function store(Request $request) {
        // dd($request);
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric|digits_between:12,15',
            'role' => 'required',
        ]);

        $user=new User();
        $user->nama=$request->nama;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->alamat=$request->alamat;
        $user->no_telepon=$request->telepon;
        $user->role=$request->role;

        if ($user->save()) {
            return redirect("/user")->with("sukses","Data User Berhasil Disimpan");
        } else {
            return redirect()->back();
        }
    }
    
    public function edit($id) {
        $data = User::find($id);
        return view('pages.admin.user.edit', compact('data'));
    }

    public function update(Request $request,$id) {
        // dd($request);
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'telepon' => 'required|numeric|digits_between:12,15',
            'role' => 'required',
        ]);

        $user=User::find($id);

        if ($request->filled('password')) {
            $password=Hash::make($request->password);
        } else {
            $password = $user->password;
        }

        $user->nama=$request->nama;
        $user->email=$request->email;
        $user->password = $password;
        $user->alamat=$request->alamat;
        $user->no_telepon=$request->telepon;
        $user->role=$request->role;

        if ($user->save()) {
            return redirect("/user")->with("sukses","Data User Berhasil Diupdate");
        } else {
            return redirect()->back();
        }
    }

    public function destroy($id) {
        $data = User::find($id);
        if ($data->delete()){
            return redirect()->back()->with('sukses', 'Data berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
    }
}
