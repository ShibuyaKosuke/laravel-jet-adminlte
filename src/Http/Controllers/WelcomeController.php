<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

class WelcomeController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function __invoke(): RedirectResponse
    {
        return redirect()->route('login');
    }
}
