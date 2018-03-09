<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;
use Validator;


class UsersController extends Controller
{


    public function __construct()
    {

        $this->middleware('permissions:superuser');
    }

    function index()
    {

        $users = User::all();
        return view('admin/users', compact('users'));
    }

    function register()
    {

        return view('admin/users-register');
    }

    function save(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'permissions' => 'required',
        ]);

        if ($validator->fails()) {

            Session::flash('alert-danger', __('admin/users-register.msg_validate'));
            return redirect('./admin/users/register')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->permissions = $request->permissions;
            $user->save();
        } catch (\Exception $e) {

            Session::flash('alert-danger', __('admin/users-register.msg_error'));
            return redirect('./admin/users');
        }

        Session::flash('alert-success', __('admin/users-register.msg_ok'));
        return redirect('./admin/users');
    }

    function delete($id)
    {

        if (Auth::id() == $id) {

            Session::flash('alert-danger', __('admin/users-del.msg_delete_self_error'));
            return redirect('./admin/users');
        }

        try {
            User::where('id', $id)->delete();
        } catch (\Exception $e) {

            Session::flash('alert-danger', __('admin/users-del.msg_error'));
            return redirect('./admin/users');
        }

        Session::flash('alert-success', __('admin/users-del.msg_ok'));
        return redirect('./admin/users');
    }

    function edit($id)
    {

        $user = User::findOrFail($id);
        return view('admin/users-edit', compact('user'));
    }

    function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'permissions' => 'required',
        ]);

        if ($validator->fails()) {

            Session::flash('alert-danger', __('admin/users-edit.msg_validate'));
            return redirect('./admin/users/edit')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $user = User::find($request->id);
            $user->permissions = $request->permissions;
            $user->save();
        } catch (\Exception $e) {

            Session::flash('alert-danger', __('admin/users-edit.msg_error'));
            return redirect('./admin/users');
        }

        Session::flash('alert-success', __('admin/users-edit.msg_ok'));
        return redirect('./admin/users');

    }
}
