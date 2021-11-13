<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

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
