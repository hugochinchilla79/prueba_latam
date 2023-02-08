<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function main()
    {
        $users = User::all();
        return view('user.list', ['users' => $users]);
    }

    public function user(Request $request, $id)
    {
        $user = User::find($id);
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'id' => 'required|integer',
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'password_confirmation' => 'required|string|same:password'
        ]);

        if($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors());
        }

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->action([MainController::class, 'main']);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|integer'
        ]); 

        $user = User::find($request->id);
        $user->delete();
    }


    public function confirmRemove(Request $request, $id)
    {
        $user = User::find($id);
        return view('user.delete', ['user' => $user]);
    }
}
