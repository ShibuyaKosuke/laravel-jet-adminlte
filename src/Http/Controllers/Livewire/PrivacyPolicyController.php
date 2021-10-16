<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use ShibuyaKosuke\LaravelJetAdminlte\Facades\JetAdminLte;

class PrivacyPolicyController extends Controller
{
    /**
     * Show the privacy policy for the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return View
     */
    public function show(Request $request): View
    {
        $policyFile = JetAdminLte::localizedMarkdownPath('policy.md');

        return view('policy', [
            'policy' => Str::markdown(file_get_contents($policyFile)),
        ]);
    }
}
