<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index() {
        //untuk menampilkan data
        $no = 1;
        $user = User::all();
        return view('pages/admin/user/index',compact('user','no'));
    }
}
