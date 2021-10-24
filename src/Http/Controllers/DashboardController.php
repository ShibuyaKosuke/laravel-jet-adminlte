<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('jet-adminlte::dashboard');
    }
}
