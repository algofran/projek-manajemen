<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        foreach ($users as $user) {
            foreach ($user->roles as $role) {
                if ($role->name == 'user') {
                    $adminId = $user->id;
                }
            }
        }

        //dd($user);
        $users = User::whereNotIn('id', [$adminId])->get();
        $roles = Role::all();

        return view('admin.users', compact('users', 'roles'));
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
    public function store(AddUserRequest $request)
    {


        $role = $this->getRoleByType($request->type);

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'type' => $request->type,
        ]);

        $user->assignRole($role);

        return redirect()->back()->with('success', 'User created successfully.');
    }




    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('admin.event');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.editUsers', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => $request->type,
            // Jika ada password baru, maka di-hash terlebih dahulu
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        $role = $this->getRoleByType($request->type);
        $user->syncRoles($role);

        return redirect()->route('user')->with('success', 'User update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User delate successfully.');
    }

    public function getUser()
    {

        // foreach ($users as $user) {
        //     foreach ($user->roles as $role){
        //         if ($role->name == 'SuperAdmin' ) {
        //             $adminId = $user->id;
        //         }
        //     }
        // }

        // $users = User::whereNotIn('id', [$adminId])->get();

        // return view('admin.users.index', compact('users'));

        $data = User::with('roles');
        return DataTables::of($data)
            ->addColumn('role', function ($data) {
                return $data->getRoleNames()->implode(', ');
            })
            ->addColumn('since', function ($data) {
                return $data->updated_at->format('Y');
            })
            ->addColumn('status', function ($data) {
                return 'Inactive';
            })
            ->filterColumn('role', function ($data, $keyword) {
                // Meng-handle search untuk kolom role
                $data->whereHas('roles', function ($query) use ($keyword) {
                    $query->where('name', 'like', "%{$keyword}%");
                });
            })
            ->toJson();
    }

    private function getRoleByType($type)
    {
        switch ($type) {
            case 0:
                return 'admin';
            case 1:
                return 'manager';
            default:
                return 'user';
        }
    }
}
