<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use Mail;
use Str;
use App\Mail\ForgotPasswordMail;

class AuthController extends Controller
{
    // Show login page
    public function login()
    {
        if (Auth::check()) {
            if (Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');
            } else if (Auth::user()->user_type == 2) {
                return redirect('teacher/dashboard');
            } else if (Auth::user()->user_type == 3) {
                return redirect('student/dashboard');
            } else if (Auth::user()->user_type == 4) {
                return redirect('parent/dashboard');
            }
        }

        return view('auth.login');
    }

    // Handle login form submission
    public function Authlogin(Request $request)
    {
        $remember = $request->has('remember') ? true : false;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            if (Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');
            } else if (Auth::user()->user_type == 2) {
                return redirect('teacher/dashboard');
            } else if (Auth::user()->user_type == 3) {
                return redirect('student/dashboard');
            } else if (Auth::user()->user_type == 4) {
                return redirect('parent/dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Please enter correct details.');
        }
    }

    // Show forgot password page
    public function forgotpassword()
    {
        return view('auth.forgot');
    }

    // Handle forgot password form submission
    public function PostForgotPassword(Request $request)
    {
        $user = User::getEmailSingle($request->email);

        if (!empty($user)) {
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', 'Please check your email and reset your password.');
        } else {
            return redirect()->back()->with('error', 'Email not found in the system.');
        }
    }

    // Show reset password page
    public function reset($remember_token)
    {
        $user = User::getTokenSingle($remember_token);

        if (!empty($user)) {
            $data['user'] = $user;
            return view('auth.reset', $data);
        } else {
            abort(404);
        }
    }

    // Handle password reset form submission
    public function PostReset($remember_token, Request $request)
    {
        if ($request->password == $request->password_confirmation) {
            $user = User::getTokenSingle($remember_token);

            if (!$user) {
                return redirect()->back()->with('error', 'Invalid token or token expired.');
            }

            // Update password and reset token
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            return redirect(url('/'))->with('success', 'Password successfully reset. Login with your new password.');
        } else {
            return redirect()->back()->with('error', 'Password and confirm password do not match.');
        }
    }

    // Handle user logout
    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
