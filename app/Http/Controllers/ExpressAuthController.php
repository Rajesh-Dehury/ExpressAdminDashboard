<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassswordMail;
use App\Models\ExpressUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ExpressAuthController extends Controller
{
    public function loginView()
    {
        return view('express_login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:express_users,email',
            'password' => 'required',
        ]);

        if (Auth::guard('express_user')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->route('express.dashboard');
        }

        return redirect()
            ->back()
            ->withErrors(['email' => 'Invalid Credentials.'])
            ->withInput();
    }


    public function logout()
    {
        Auth::guard('express_user')->logout();
        return redirect()->route('express.login');
    }


    public function forgotPasswordView()
    {
        return view('express_forgot_password');
    }


    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:express_users,email',
        ]);

        $express_user = ExpressUser::where('email', $request->email)->first();
        $forgot_password = Str::random(20);

        $express_user->update([
            'forgot_password' => $forgot_password,
        ]);

        try {
            $data = [
                'forgot_password' => $forgot_password,
                'express_user' => $express_user,
                'link' => route('express.forgot.link', ['link' => $forgot_password, 'id' => $express_user->id]),
            ];

            Mail::to('test@gmail.com')->send(new ForgotPassswordMail($data));
        } catch (Exception $e) {
        }

        return back()->with('message', "Please check your email.");
    }


    public function forgotPasswordViewLink()
    {
        $express_user_id = request('id');
        $express_user_link = request('link');

        $express_user = ExpressUser::find($express_user_id);

        if ($express_user->forgot_password == $express_user_link) {
            return view('express_forgot_link', ['email' => $express_user->email, 'forgot_password' => $express_user->forgot_password]);
        } else {
            abort(404);
        }
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'password_confermation' => 'required|same:password'
        ]);

        $express_user = ExpressUser::where('email', $request->email)->first();

        if ($express_user) {
            if ($express_user->forgot_password == $request->forgot_password) {
                $express_user->update(
                    [
                        'password' => Hash::make($request->password),
                        'forgot_password' => null,
                    ]
                );

                return redirect()->route('express.login');
            } else {
                abort(404);
            }
        }
        return back();
    }


    function changePasswordView()
    {
        return view('express_change_password');
    }

    function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_new_password' => 'required|same:new_password'
        ]);

        $expressUser = Auth::guard('express_user')->user();

        if (Hash::check($request->old_password, $expressUser->password)) {
            ExpressUser::find($expressUser->id)->update([
                'password' => Hash::make($request->new_password)
            ]);

            return redirect()->route('express.dashboard');
        }

        return redirect()
            ->back()
            ->withErrors(['old_password' => 'Invalid Password.'])
            ->withInput();
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
