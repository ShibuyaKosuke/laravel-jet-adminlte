<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class WelcomeController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('jet-adminlte::welcome');
    }
}
