<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth;

use Illuminate\Contracts\View\View;

class SecurityController
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('jet-adminlte::security.index');
    }
}
