<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Livewire\Forms;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class File extends Component
{
    /**
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('jet-adminlte::components.forms.file');
    }
}
