<?php

// Oauth Social Login
Route::prefix('login')->group(function () {
    Route::get('{provider}', [\ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\SocialAccountController::class, 'redirectToProvider'])->name('oauth');
    Route::get('{provider}/callback', [\ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\SocialAccountController::class, 'handleProviderCallback'])->name('oauth.callback');
});

Route::get('jet-adminlte/examples', [\ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Livewire\ExampleController::class, 'index'])->name('adminlte.examples');

