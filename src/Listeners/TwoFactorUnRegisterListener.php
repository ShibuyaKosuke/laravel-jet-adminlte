<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Listeners;

use ShibuyaKosuke\LaravelJetAdminlte\Events\TwoFactorUnRegisterEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Services\UserAgentSecurityService;

class TwoFactorUnRegisterListener
{
    /**
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param TwoFactorUnRegisterEvent $event
     * @return void
     */
    public function handle(TwoFactorUnRegisterEvent $event)
    {
        (new UserAgentSecurityService($event))->writeLog();
    }
}
