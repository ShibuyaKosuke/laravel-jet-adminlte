<?php

// Oauth Social Login
use ShibuyaKosuke\LaravelJetAdminlte\Facades\JetAdminLte;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\SocialAccountController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Livewire\ExampleController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Livewire\PrivacyPolicyController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Livewire\TermsOfServiceController;

Route::prefix('login')->group(function () {
    // OAuth
    Route::get('{provider}', [SocialAccountController::class, 'redirectToProvider'])->name('oauth');
    Route::get('{provider}/callback', [SocialAccountController::class, 'handleProviderCallback'])->name('oauth.callback');
});

if (JetAdminLte::hasTermsAndPrivacyPolicyFeature()) {
    Route::get('/terms-of-service', [TermsOfServiceController::class, 'show'])->name('terms.show');
    Route::get('/privacy-policy', [PrivacyPolicyController::class, 'show'])->name('policy.show');
}

Route::get('jet-adminlte/examples', [ExampleController::class, 'index'])->name('adminlte.examples');

Route::middleware(['auth'])->group(function () {

});
