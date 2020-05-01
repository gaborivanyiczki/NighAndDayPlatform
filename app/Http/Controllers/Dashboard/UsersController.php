<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:administrator');
    }

    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('dashboard.user.index');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('dashboard.user.edit', [
            'model' => $user
            ]);
    }

    public function update(Request $request)
    {
        if (Auth::check())
        {
            $request->validate([
                'firstname' => ['required'],
                'lastname' => ['required'],
                'telephone' => ['required'],
                'active' => ['required']
            ]);

            $user = User::find($request->UserID);

            $user->fill($request->input());

            $user->save();

            return redirect()->route('dashboard.users');
        }
        else
        {
            return response('Not found', 400);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user->delete()) {
                session()->flash('app_message', 'User successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting User');
            }

        return redirect()->back();
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

            $user = User::find(Auth::user()->id);

            $user->update(['password'=> Hash::make($request->new_password)]);

            $user->save();

            return redirect()->route('dashboard.user.profile');
        }
        else
        {
            return response('Not found', 400);
        }
    }

    public function updateProfile(Request $request)
    {
        if (Auth::check())
        {
            $request->validate([
                'firstname' => ['required'],
                'lastname' => ['required'],
                'telephone' => ['required'],
                'active' => ['required']
            ]);

            $user = User::find(Auth::user()->id);

            $user->fill($request->input());

            $user->save();

            return redirect()->route('dashboard.user.profile');
        }
        else
        {
            return response('Not found', 400);
        }
    }

}
