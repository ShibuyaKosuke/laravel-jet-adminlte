<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth;

use Illuminate\Contracts\View\View;

class AccessTokenController
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('jet-adminlte::access-token.index');
    }
}
