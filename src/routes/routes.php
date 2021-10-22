<?php

// Oauth Social Login
use Illuminate\Support\Facades\Route;
use ShibuyaKosuke\LaravelJetAdminlte\Facades\JetAdminLte;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\AccountController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\AuthenticatedSessionController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\ConfirmablePasswordController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\EmailVerificationNotificationController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\EmailVerificationPromptController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\NewPasswordController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\PasswordResetLinkController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\RegisteredUserController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\SocialAccountController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\VerifyEmailController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Livewire\PrivacyPolicyController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Livewire\TermsOfServiceController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\PasswordController;

Route::middleware(['web'])->group(function () {
    // Guest
    Route::middleware(['guest'])->group(function () {
        Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store']);
        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
        Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');

        if (JetAdminLte::hasTermsAndPrivacyPolicyFeature()) {
            Route::get('/terms-of-service', [TermsOfServiceController::class, 'show'])->name('terms.show');
            Route::get('/privacy-policy', [PrivacyPolicyController::class, 'show'])->name('policy.show');
        }

        if (JetAdminLte::hasSocialLoginFeature()) {
            Route::prefix('login')->group(function () {
                // OAuth
                Route::get('{provider}', [SocialAccountController::class, 'redirectToProvider'])->name('oauth');
                Route::get('{provider}/callback', [SocialAccountController::class, 'handleProviderCallback'])->name('oauth.callback');
            });
        }
    });

    // Auth
    Route::middleware(['auth'])->group(function () {
        Route::resource('/account', AccountController::class)->only(['index', 'edit', 'update', 'destroy']);

        Route::get('/password', [PasswordController::class, 'edit'])->name('password.edit');
        Route::put('/password', [PasswordController::class, 'update'])->name('password.update');

        Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
        Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->name('verification.verify');
        Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->name('verification.send');
        Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
        Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])->middleware('auth');
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });
});
