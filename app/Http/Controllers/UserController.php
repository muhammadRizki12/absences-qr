<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return view('users.index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $user = UserModel::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jenjang_jabatan' => $request->jenjang_jabatan,
            'pangkat' => $request->pangkat,
            'golongan' => $request->golongan,
            'jabatan_tugas_utama' => $request->jabatan_tugas_utama,
            'jabatan_tugas_tambahan' => $request->jabatan_tugas_tambahan,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('user.index')->with('success', 'User created successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
