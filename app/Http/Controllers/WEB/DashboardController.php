<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('admin.pages.dashboard.index');
    }

    public function owner()
    {
        return view('owner.pages.dashboard.index');
    }

    public function client()
    {
        return view('client.pages.dashboard.index');
    }
}
