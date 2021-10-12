<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class ExampleController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        if (!config('jet_adminlte.examples')) {
            abort(404);
        }
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('adminlte::examples.index');
    }
}
