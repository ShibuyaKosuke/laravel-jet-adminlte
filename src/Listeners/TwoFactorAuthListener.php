<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Listeners;

use ShibuyaKosuke\LaravelJetAdminlte\Events\TwoFactorAuthEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Services\UserAgentSecurityService;

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
        (new UserAgentSecurityService($event))->writeLog();
    }
}
