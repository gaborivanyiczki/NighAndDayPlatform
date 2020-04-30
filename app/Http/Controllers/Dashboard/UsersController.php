<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:administrator');
    }

    public function profile()
    {
        $userDetails = Auth::user();
        return view('dashboard.user.profile', [
            'userDetails' => $userDetails
            ]);
    }

    public function resetPassword(Request $request)
    {
        if (Auth::check())
        {
            $request->validate([
                'current_password' => ['required'],
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ]);

            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

            return redirect()->route('dashboard.user.profile');
        }
        else
        {
            return response('Not found', 400);
        }
    }

}
