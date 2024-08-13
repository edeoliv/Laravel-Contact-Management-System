<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

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
     * Return the forgot-password view.
     *
     * @return view
     */
    public function showForgotPasswordForm()
    {
        return view('user.auth.forgot-password');
    }

    /**
     * Return the reset-password view.
     *
     * @param string $token
     * @return view
     */
    public function showResetPasswordForm(string $token)
    {
        return view('user.auth.reset-password', ['token' => $token]);
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

        toast()->success(
            message: 'Please log in.',
            title: 'Registration successful!',
        )->pushOnNextPage();

        return redirect('login');
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
            $userName = Auth::user()->name;

            toast()->success(
                message: "$userName, This is the Dashboard",
                title: 'Be Welcome!'
            )->pushOnNextPage();

            return redirect('dashboard');
        }

        toast()->danger(
            message: 'Please try again.',
            title: 'Invalid credentials',
        )->push();

        return redirect('login');
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

        toast()->success(
            message: 'Come back often',
            title: 'Logout successful',
        )->pushOnNextPage();

        return redirect('login');
    }

    /**
     * Send the user an email with the link to reset their password.
     *
     * @param Request $request
     * @return redirect $status
     */
    public function userForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            toast()->success(
                message: __($status),
                title: 'Forgot Password',
            )->pushOnNextPage();

            return back();
        }

        toast()->danger(
            message: __($status),
            title: 'Forgot Password',
        )->pushOnNextPage();

        return back();
    }

    /**
     * Reset User password and redirect to login page with status.
     *
     * @param Request $request
     * @return redirect $status
     */
    public function userResetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            toast()->success(
                message: __($status),
                title: 'Reset Password',
            )->pushOnNextPage();

            return redirect()->route('login');
        }

        toast()->danger(
            message: __($status),
            title: 'Forgot Password',
        )->pushOnNextPage();

        return back();
    }
}
