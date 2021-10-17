<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $listquiz = Quiz::all();
        return view('admin.dashboard', compact('listquiz'));
    }

    public function dashboardUser()
    {
        return view('dashboard');
    }
}
