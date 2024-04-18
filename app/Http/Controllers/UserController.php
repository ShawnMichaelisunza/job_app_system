<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\AdminMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    // register ---------

    public function register(){


        return view('admin.register');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed']
        ]);

        $validated['password'] = Hash::make($validated['password']);

        if($request->has('email')){
            Mail::to($validated['email'])->send(new AdminMail);
        }

        $user = User::create($validated);

        auth()->login($user);

    }

    // login ----------

    public function create(){

        if (view()->exists('admin.login'))
        {
            return view('admin.login');
        }else{
            return abort(404);
            // return response()->view('errorfolder.errorfile');
        }
    }

    public function login(){

        $validated = request()->validate([
            'email' => ['required' , 'email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($validated)){
            request()->session()->regenerate();

            if(Auth::id()){

                $usertype = auth()->user()->usertype;

                if($usertype == 'user'){

                    return abort(404);

                }elseif($usertype == 'admin'){

                    return redirect()->route('admin.dashboard');
                }

            }
        }

        return back()->withErrors(['email' => 'login failed'])->onlyInput('email');
    }

    // logout

    public function logout(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard');

    }




}
