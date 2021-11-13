<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class AccessTokenController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('jet-adminlte::access-token.index');
    }
}
