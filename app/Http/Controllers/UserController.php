<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct(User $user)     
    {
        $this->user = $user;
    }
    public function index()
    {
        $users = $this->user->get();
        return view('user_admin.index', compact('users'));
    }

    public function create()
    {
        return view('user_admin.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'posisi' => 'required',
            'email' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);
        
        $insert = User::insert([
            'name' => $request->name,
            'username' => $request->username,
            'posisi' => $request->posisi,
            'email'   => $request->email,
            'telepon'   => $request->telepon,
            'alamat'   => $request->alamat,
            'password' => bcrypt($request->password)
        ]);

        if($insert == true ){
            return redirect()->route('user')->with(['message' => 'Berhasil Menambah User', 'type' => 'success']);
        } else {
            return redirect()->route('user')->with(['message' => 'Gagal Menambah User', 'type' => 'error']);
        }
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('user_admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'posisi' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'telepon' => 'required'
        ]);

        $update = User::where('id', $id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'posisi' => $request->posisi,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon
        ]);

        if($update == true) {
            return redirect()->route('user')->with(['message' => 'Berhasil Mengubah Data User', 'type' => 'success']);
        } else {
            return redirect()->route('user')->with(['message' => 'Gagal Mengubah Data User', 'type' => 'error']);
        }
    }

    public function destroy($id)
    {
    
        User::destroy($id);
        return redirect()->route('user', ['id' => $id]);
    }
}
