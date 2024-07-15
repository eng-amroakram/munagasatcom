<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebPagesController extends Controller
{
    public function landingPage()
    {
        return view('pages.web.landing-page');
    }

    public function logout()
    {
        $user = Auth::user();
        $route = "web.login";

        if ($user) {
            if (in_array($user->account_type, ['superadmin', 'admin'])) {
                $route = "admin.login";
            }

            if (in_array($user->account_type, ['person', 'company', 'employee'])) {
                $route = "web.login";
            }

            Auth::logout();
            return redirect()->route($route);
        }

        return redirect()->route('index');
    }
}
