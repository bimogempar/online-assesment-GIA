<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginPage()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nopeg' => ['required'],
            'dateofbirth' => ['required'],
        ]);

        $nopeg = $request['nopeg'];
        $dateofbirth = $request['dateofbirth'];

        $user = User::where([
            ["nopeg", $nopeg],
            ["dateofbirth", $dateofbirth],
        ])->first();

        if ($user != null) {
            Auth::login($user);
            if ($user->level == 'admin')
                return redirect('/admin/dashboard')->with(['success' => 'Success login']);
            elseif ($user->level == 'user')
                return redirect('/dashboard')->with(['success' => 'Success login']);
        } else {
            return redirect()->back()->with(['error' => 'Your record is doesnt matched']);
        }
    }
}
