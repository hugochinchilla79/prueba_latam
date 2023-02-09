<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Country;
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

    public function newUser()
    {
        $countries = Country::all();
        return view('user.create', ['countries' => $countries]);
    }


    public function create(Request $request)
    {
        $validation = Validator::make(request()->all(),$this->getUserValidationRules());

        if($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors());
        }

        $this->saveUser((new User()), $request);
        return redirect()->action([MainController::class, 'main']);
    }

    public function user(Request $request, $id)
    {
        $countries = Country::all();
        $user = User::find($id);
        return view('user.edit', ['user' => $user, 'countries' => $countries]);
    }

    public function update(Request $request)
    {
        $validation = Validator::make($request->all(),$this->getUserValidationRules());
        if($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors());
        }

        $user = User::find($request->id);
        $this->saveUser($user, $request);
        return redirect()->action([MainController::class, 'main']);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|integer'
        ]); 

        $user = User::find($request->id);
        $user->delete();

        return redirect()->action([MainController::class, 'main']);
    }


    public function confirmRemove(Request $request, $id)
    {
        $user = User::find($id);
        return view('user.delete', ['user' => $user]);
    }


    private function getUserValidationRules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'id_country' => 'required|integer',
            'password_confirmation' => 'required|string|same:password'
        ];
    }


    private function saveUser(User $user, Request $request)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->id_country = $request->id_country;
        $user->save();
    }
}
