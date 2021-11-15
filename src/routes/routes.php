<?php

use Illuminate\Support\Facades\Route;
use ShibuyaKosuke\LaravelJetAdminlte\Facades\JetAdminLte;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\AccountController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\AccessTokenController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\AuthenticatedSessionController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\EmailVerificationNotificationController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\EmailVerificationPromptController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\NewPasswordController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\NotificationController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\PasswordResetLinkController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\RegisteredUserController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\SecurityController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\SocialAccountController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\TwoFactorAuthenticationController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Auth\VerifyEmailController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Livewire\PrivacyPolicyController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Livewire\TermsOfServiceController;
use ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\PasswordController;

Route::middleware(['web'])->group(function () {
    // OAuth
    if (JetAdminLte::hasSocialLoginFeature()) {
        Route::prefix('oauth')->group(function () {
            Route::get('{provider}', [SocialAccountController::class, 'redirectToProvider'])->name('oauth');
            Route::get('{provider}/callback', [SocialAccountController::class, 'handleProviderCallback'])->name('oauth.callback');
            Route::delete('{provider}', [SocialAccountController::class, 'detachSocialAccount'])->name('oauth.destroy');
        });
    }

    // Guest
    Route::middleware(['guest'])->group(function () {
        Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');

        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store']);

        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('reset-password.reset');
        Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('reset-password.update');

        // TermAndPrivacy
        if (JetAdminLte::hasTermsAndPrivacyPolicyFeature()) {
            Route::get('/terms-of-service', [TermsOfServiceController::class, 'show'])->name('terms.show');
            Route::get('/privacy-policy', [PrivacyPolicyController::class, 'show'])->name('policy.show');
        }
    });

    // Auth
    Route::middleware(['auth'])->group(function () {
        Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verify-email.notice');
        Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->name('verify-email.verify');

        Route::get('/account', [AccountController::class, 'index'])->name('account.index');
        Route::get('/account/edit', [AccountController::class, 'edit'])->name('account.edit');
        Route::put('/account', [AccountController::class, 'update'])->name('account.update');
        Route::delete('/account', [AccountController::class, 'destroy'])->name('account.destroy');

        Route::get('/mail-notification', [NotificationController::class, 'index'])->name('mail-notification');

        Route::get('/password', [PasswordController::class, 'edit'])->name('password.edit');
        Route::put('/password', [PasswordController::class, 'update'])->name('password.update');

        Route::get('/security', [SecurityController::class, 'index'])->name('security');

        Route::get('/access-token', AccessTokenController::class)->name('access-token');

        Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->name('verification.send');

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        //Two factor
        if (JetAdminLte::hasTwoFactorFeature()) {
            Route::get('/two-factor-auth', [TwoFactorAuthenticationController::class, 'index'])->name('two-factor-auth');
            Route::post('/two-factor-auth', [TwoFactorAuthenticationController::class, 'store'])->name('two-factor-auth.store');
            Route::delete('/two-factor-auth', [TwoFactorAuthenticationController::class, 'destroy'])->name('two-factor-auth.destroy');
        }
    });
});
