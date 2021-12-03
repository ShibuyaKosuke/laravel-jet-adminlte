<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Listeners;

use ShibuyaKosuke\LaravelJetAdminlte\Events\TwoFactorRegisterEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Services\UserAgentSecurityService;

class TwoFactorRegisterListener
{
    /**
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param TwoFactorRegisterEvent $event
     * @return void
     */
    public function handle(TwoFactorRegisterEvent $event)
    {
        (new UserAgentSecurityService($event->request))->writeLog();
    }
}
