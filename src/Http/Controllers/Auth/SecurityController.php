<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use ShibuyaKosuke\LaravelJetAdminlte\Models\UserAgent;

class SecurityController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $userAgents = UserAgent::query()
            ->where('user_id', $request->user()->id)
            ->orderByDesc('updated_at')
            ->paginate();
        return view('jet-adminlte::security.index', compact('userAgents'));
    }
}
