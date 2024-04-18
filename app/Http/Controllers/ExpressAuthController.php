<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassswordMail;
use App\Models\ExpressClient;
use App\Models\ExpressClientAdmin;
use App\Models\ExpressUser;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
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
            'email' => 'required|exists:express_client_admins,email',
            'password' => 'required',
        ]);

        if (Auth::guard('express_client_admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->route('express.dashboard');
        }

        return redirect()
            ->back()
            ->withErrors(['email' => 'Invalid Credentials.'])
            ->withInput();
    }


    public function logout()
    {
        Auth::guard('express_client_admin')->logout();
        return redirect()->route('express.login');
    }


    public function forgotPasswordView()
    {
        return view('express_forgot_password');
    }


    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:express_client_admins,email',
        ]);

        $express_client_admin = ExpressClientAdmin::where('email', $request->email)->first();
        $forgot_password = Str::random(20);

        $express_client_admin->update([
            'forgot_password' => $forgot_password,
        ]);

        try {
            $data = [
                'forgot_password' => $forgot_password,
                'express_client_admin' => $express_client_admin,
                'link' => route('express.forgot.link', ['link' => $forgot_password, 'id' => $express_client_admin->id]),
            ];

            Mail::to($express_client_admin->email)->send(new ForgotPassswordMail($data));
        } catch (Exception $e) {
        }

        return back()->with('message', "Please check your email.");
    }


    public function forgotPasswordViewLink()
    {
        $express_client_admin_id = request('id');
        $express_client_admin_link = request('link');

        $express_client_admin = ExpressClientAdmin::find($express_client_admin_id);

        if ($express_client_admin->forgot_password == $express_client_admin_link) {
            return view('express_forgot_link', ['email' => $express_client_admin->email, 'forgot_password' => $express_client_admin->forgot_password]);
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

        $express_client_admin = ExpressClientAdmin::where('email', $request->email)->first();

        if ($express_client_admin) {
            if ($express_client_admin->forgot_password == $request->forgot_password) {
                $express_client_admin->update(
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


    function updateProfile()
    {

        $express_client_admin = Auth::guard('express_client_admin')->user();
        return view(
            'settings',
            compact('express_client_admin',)
        );
    }

    public function updateProfilePost(Request $request)
    {
        $rules = [];

        if (!empty($request->old_password)) {
            $rules += [
                'old_password' => 'required',
                'new_password' => 'required',
                'confirm_new_password' => 'required|same:new_password',
            ];
        }

        if ($request->hasFile('logo')) {
            $rules['logo'] = 'image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        $rules['organisation_name'] = 'nullable|string|max:255';

        $request->validate($rules);

        $ExpressClientAdmin = Auth::guard('express_client_admin')->user();

        if (!empty($request->old_password) && !Hash::check($request->old_password, $ExpressClientAdmin->password)) {
            return redirect()
                ->back()
                ->withErrors(['old_password' => 'Invalid Password.'])
                ->withInput();
        }

        $expUser = ExpressClientAdmin::find($ExpressClientAdmin->id);

        $expUser->update([
            'password' => Hash::make($request->new_password),
        ]);

        if ($request->hasFile('logo')) {
            $oldLogoPath = str_replace('/storage', 'public', $expUser->logo);
            Storage::delete($oldLogoPath);

            $logoPath = $request->file('logo')->store('logos', 'public');
            $expUser->update(['logo' => Storage::url($logoPath)]);
        }

        $expUser->update(['organisation_name' => $request->input('organisation_name')]);

        return redirect()->route('express.update.profile');
    }

    public function dashboard()
    {
        $express_client_admin = Auth::guard('express_client_admin')->user();

        // Dashboard statistics
        $express_client = ExpressClient::with('expressUsers.expressReport')->where('slug', $express_client_admin->omr_client_id)->first();
        $total_registered_user = $express_client->expressUsers;

        // total registered users
        $total_registered_user_count = $total_registered_user->count();

        // report generated count
        $reportCount = 0;
        foreach ($express_client->expressUsers as $user) {
            $reportCount += $user->expressReport ? 1 : 0;
        }

        // pending report count
        $pendingReports = $total_registered_user_count - $reportCount;

        // month and year
        $end_month = Carbon::now()->subMonth()->format('M');
        $start_month = Carbon::now()->subMonth(3)->format('M');

        $year = Carbon::now()->subMonth()->format('Y') == Carbon::now()->subMonth(3)->format('Y') ? Carbon::now()->subMonth()->format('Y') : Carbon::now()->subMonth(3)->format('Y') . ' - ' . Carbon::now()->subMonth()->format('Y');


        // fectch the quater data
        $currentDate = Carbon::now();
        $startDate = $currentDate->copy()->subMonths(3)->startOfMonth();
        $endDate = $currentDate->copy()->subMonths(1)->endOfMonth();

        $express_client_quater = ExpressClient::with('expressUsers.expressReport')
            ->where('slug', $express_client_admin->omr_client_id)
            ->whereHas('expressUsers', function ($query) use ($startDate, $endDate) {
                // dd($query);
                $query->whereBetween('created_at', [$startDate, $endDate]);
            })
            ->first();

        // total registered users
        $total_registered_user_quater = ExpressUser::where('omr_client_id', $express_client_admin->omr_client_id)
            ->whereBetween('created_at', [$startDate, $endDate])->get();
        $total_registered_user_quater_count = $total_registered_user_quater->count();

        $reportCountQuater = 0;
        foreach ($total_registered_user_quater as $user) {
            $reportCountQuater += $user->expressReport ? 1 : 0;
        }

        return view(
            'dashboard',
            compact(
                'express_client_admin',
                'express_client',
                'total_registered_user_count',
                'reportCount',
                'pendingReports',
                'end_month',
                'start_month',
                'year',
                'total_registered_user_quater_count',
                'reportCountQuater'
            )
        );
    }
}
