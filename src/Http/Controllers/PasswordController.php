<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use ShibuyaKosuke\LaravelJetAdminlte\Events\PasswordChangeEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Requests\PasswordRequest;

class PasswordController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        return view('jet-adminlte::password.edit', compact('user'));
    }

    /**
     * @param PasswordRequest $request
     * @return RedirectResponse
     */
    public function update(PasswordRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill([
            'password' => Hash::make($request->new_password)
        ]);

        if ($user->isDirty()) {
            event(new PasswordChangeEvent($request));
        }

        $user->save();
        return redirect()->route('dashboard')
            ->with('success_message', trans('jet-adminlte::adminlte.success_update_message'));
    }
}
