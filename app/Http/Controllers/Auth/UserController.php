<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Return the login view.
     *
     * @return view
     */
    public function showLoginForm()
    {
        return view('user.auth.login');
    }

    /**
     * Return the register view.
     *
     * @return view
     */
    public function showRegisterForm()
    {
        return view('user.auth.register');
    }

    /**
     * Store created User in database and redirect to login page.
     *
     * @param Request $request
     * @return redirect
     */
    public function userRegister(Request $request)
    {
        /**
         * Validation
         */
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        /**
         * Database Insertion
         */
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('login')->with('success', 'Registration successful! Please log in.');
    }

    /**
     * Login | Create User session and redirect to dashboard.
     *
     * @param Request $request
     * @return redirect
     */
    public function userLogin(Request $request)
    {
        $credentials = $request->only([
            'email',
            'password',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect('dashboard');
        }

        return redirect('login')->with('error', 'Invalid credentials. Please try again.');
    }

    /**
     * Logout | Destroy User session and redirect to login page.
     *
     * @param Request $request
     * @return redirect
     */
    public function userLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
