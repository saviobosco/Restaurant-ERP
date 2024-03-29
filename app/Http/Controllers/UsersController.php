<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('users.index')
            ->with(compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone_number' => $request->input('phone_number'),
            'role' => $request->input('role')
        ]);

        if ($user) {
            session()->flash('success', 'New user was successfully added!');
        } else {
            session()->flash('error', 'New user could not be added!');
        }

        return redirect()
            ->route('users.index');
    }


    public function edit(User $user)
    {
        return view('users.edit')
            ->with(compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $updated = $user->update($request->input());
        if ($updated) {

            session()->flash('success', 'User was successfully updated!');
        } else {

            session()->flash('error', 'User could not be updated. Please try again.');
        }
        return back();
    }



    public function destroy(User $user)
    {
        try {
            $user->delete();

            session()->flash('success', 'USer was successfully deleted.');
        } catch (\Exception $exception) {
            session()->flash('error', 'an error occurred while deleting user.');
        }

        return back();
    }
}
