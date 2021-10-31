<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth;

use Illuminate\Contracts\View\View;

class TwoFactorAuthenticationController
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('jet-adminlte::two-factor-auth.index');
    }
}
