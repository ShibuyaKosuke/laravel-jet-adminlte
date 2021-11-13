<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class NotificationController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('jet-adminlte::mail-notification.index');
    }
}
