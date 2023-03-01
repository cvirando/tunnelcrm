<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Auth;
use Hash;
use Session;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:super-admin|staff']);
        $this->middleware('permission:update profile', ['only' => ['profile']]);
        $this->middleware('permission:manage users',   ['only' => ['index', 'store', 'delete']]);
    }

    public function index()
    {
        $users = User::orderby('id', 'desc')->get();
        $roles = Role::get();
        return view('users.index', compact('users', 'roles'));
    }

    public function profile(Request $request)
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ));

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make('password');
        $user->save();
        $roles = $request['roles']; //Retrieving the roles field
        //Checking if a role was selected
        if (isset($roles)) {
            foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();
                $user->assignRole($role_r); //Assigning role to user
            }
        }
        Session::flash('message', 'User successfully added.');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email'=>'required|email|unique:users,email,'.$id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);


        $input = $request->only([
            'name', 'email'
        ]);
        if (trim($request->get('password')) != '') {
            $user->password = Hash::make(trim($request->get('password')));
        }
        $roles = $request['roles']; //Retreive all roles
        $user->fill($input)->save();
        if($user->hasRole('super-admin')) {
            if($roles != null) {
                if (isset($roles)) {
                    $user->roles()->sync($roles);
                } else {
                    $user->roles()->detach();
                }
            }
        }
        Session::flash('message', 'Profile successfully updated.');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Session::flash('message', 'User successfully deleted.');
        return redirect()->route('usersIndex');
    }
}
