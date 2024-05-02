<?php

namespace App\Http\Controllers;

use App\Models\UserEmploye;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserEmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $i = 1;
        $role = ["Administrator", "Manager", "Staff"];
        $user = UserEmploye::orderBy('firstname')->get();
        return view('user.list_user', compact('i', 'user', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'username' => 'required|string',
            'type' => 'required|in:0,1,2',
            'password' => 'required|string|min:6|confirmed',
            'cpassword' => 'required|string|min:6|same:password', // Validasi konfirmasi password
        ]);

        $user = new UserEmploye();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->type = $request->type;
        $user->avatar = $request->type . '.png';
        $user->save();

        return redirect()->back()->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'firstname' => 'required|string',
        //     'lastname' => 'required|string',
        //     'username' => 'required|string', // Pastikan username unik kecuali untuk user dengan ID yang sedang diupdate
        //     'type' => 'required|in:0,1,2',
        //     'password' => 'nullable|string|min:6|confirmed', // Password bisa kosong
        //     'cpassword' => 'nullable|string|min:6|same:password', // Validasi konfirmasi password hanya jika password diisi
        // ]);

        $user = UserEmploye::findOrFail($id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->username = $request->username;
        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->type = $request->type;
        // Perhatikan bahwa penggunaan avatar mungkin tidak perlu diupdate karena kemungkinan avatar tetap sama
        $user->save();

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = UserEmploye::findOrFail($id);

        $user->delete();

        return redirect()->back()->with('success', 'user deleted successfully!');
    }
}
