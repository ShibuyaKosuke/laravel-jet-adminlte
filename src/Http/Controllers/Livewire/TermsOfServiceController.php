<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use ShibuyaKosuke\LaravelJetAdminlte\Facades\JetAdminLte;

class TermsOfServiceController extends Controller
{
    /**
     * Show the terms of service for the application.
     *
     * @param Request $request
     * @return View
     */
    public function show(Request $request): View
    {
        $termsFile = JetAdminLte::localizedMarkdownPath('terms.md');

        return view('jet-adminlte::terms', [
            'terms' => Str::markdown(file_get_contents($termsFile)),
        ]);
    }
}
