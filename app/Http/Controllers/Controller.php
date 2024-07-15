<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $user = auth()->user();

        if ($user) {
            if ($user->account_type == 'superadmin') {
                return redirect()->route('admin.index');
            }

            if ($user->account_type == 'admin') {
                return redirect()->route('admin.index');
            }

            if ($user->account_type == 'person') {
                return redirect()->route('web.tenders.index');
            }

            if ($user->account_type == 'company') {
                return redirect()->route('web.tenders.index');
            }
        }


        return redirect()->route('web.landing-page');
    }
}
