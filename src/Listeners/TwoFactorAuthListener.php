<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Listeners;

use ShibuyaKosuke\LaravelJetAdminlte\Events\TwoFactorAuthEvent;

class TwoFactorAuthListener
{
    /**
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param TwoFactorAuthEvent $event
     * @return void
     */
    public function handle(TwoFactorAuthEvent $event)
    {
        //
    }
}
