<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PDOException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('direktur.karyawan.karyawan', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('direktur.karyawan.karyawancreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|string',
            'nama' => 'required',
            'jabatan' => 'required',
            'password' => 'required'
        ]);
        
        try {
            $user = User::create([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'password' => Hash::make($request->password)
            ]);
            return redirect()->route('karyawan.show', $user->nip);
        } catch (PDOException $e) {
            return response()->json([
                'status' => 'Failed',
                'message' => $e,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $users = User::find($id);
        return view('direktur.karyawan.karyawanshow', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $users = User::find($id);

        return view('direktur.karyawan.karyawanedit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);

        try {
            $user = User::find($id);
            $user->nip = $request->nip;
            $user->nama = $request->nama;
            $user->jabatan = $request->jabatan;

            $user->save();

            return redirect()->route('karyawan.show', $user->nip);
        } catch (PDOException $e) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Terjadi kesalahan. ' + $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('karyawan.index');
    }
}
