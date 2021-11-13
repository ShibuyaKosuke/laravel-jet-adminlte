<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

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
