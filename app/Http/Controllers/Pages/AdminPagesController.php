<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminPagesController extends Controller
{
    public function index()
    {
        return view('pages.admin.index');
    }

    public function logout()
    {
        $admin = Auth::user();

        $route = "web.login";
        if ($admin) {

            if (in_array($admin->account_type, ['superadmin', 'admin'])) {
                $route = "admin.login";
            }

            if (in_array($admin->account_type, ['person', 'company', 'employee'])) {
                $route = "web.login";
            }

            Auth::logout();
            return redirect()->route($route);
        }

        return redirect()->route('index');
    }

    public function table()
    {
        return view('pages.admin.table');
    }
}
