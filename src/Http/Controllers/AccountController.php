<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Requests\AccountRequest;

class AccountController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $user = $request->user();
        return view('jet-adminlte::account.index', compact('user'));
    }

    /**
     * @param Request $request
     * @return View
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        return view('jet-adminlte::account.edit', compact('user'));
    }

    /**
     * @param AccountRequest $request
     * @return RedirectResponse
     */
    public function update(AccountRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill(
            $request->validated()
        )->save();
        return redirect()->route('account.index')
            ->with('success_message', trans('jet-adminlte::adminlte.success_update_message'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->user()->delete();
        return redirect()->route('welcome');
    }
}
