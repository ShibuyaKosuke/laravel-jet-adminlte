<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth;

use Illuminate\Contracts\View\View;

class NotificationController
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('jet-adminlte::mail-notification.index');
    }
}
