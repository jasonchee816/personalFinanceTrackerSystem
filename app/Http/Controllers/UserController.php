<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
        // Show Register/Create Form
        public function create() {
            return view('register');
        }
    
        // Create New User
        public function storeUser(Request $request) {
            $request->validate([
                'name' => ['required', 'min:3'],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => 'required|min:6',
                'tel_no'=> 'required'
            ]);
            $data = $request->all();
            $data['is_admin']=0;
            // Hash Password
            $data['password'] = bcrypt($data['password']);
    
            // Create User
            $user = User::create($data);
            // Login
            Auth::login($user);
    
            return redirect('/')->with('message', 'User created and logged in');
        }
    
        // Logout User
        public function logout(Request $request) {
            Auth::logout();
    
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            return redirect('/')->with('message', 'You have been logged out!');
    
        }
    
        // Show Login Form
        public function userLogin() {
            return view('users.login');
        }

        // Show Admin Login Form
        public function adminLogin() {
            return view('admin.login');
        }
    
        // Authenticate User
        public function authenticateUser(Request $request) 
        {
            $formFields = $request->validate([
                'email' => ['required', 'email'],
                'password' => 'required'
            ]);
    
            if(auth()->attempt(['email' => $request->email, 'password' => $request->password, 'is_admin'=> 0])) {
                $request->session()->regenerate();
    
                return redirect()->intended('/');
            }
    
            return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        }

        // Authenticate Admin
        public function authenticateAdmin(Request $request) 
        {
            $formFields = $request->validate([
                'email' => ['required', 'email'],
                'password' => 'required'
            ]);
    
            if(auth()->attempt(['email' => $formFields->email, 'password' => $formFields->password, 'is_admin'=> 1])) {
                $request->session()->regenerate();
    
                return redirect()->intended('/');
            }
    
            return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        }
}
