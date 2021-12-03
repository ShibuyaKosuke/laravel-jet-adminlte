<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Listeners;

use ShibuyaKosuke\LaravelJetAdminlte\Events\LoginEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\LogoutEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Services\UserAgentSecurityService;

class LogoutListener
{
    /**
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param LogoutEvent $event
     * @return void
     */
    public function handle(LogoutEvent $event)
    {
        (new UserAgentSecurityService($event))->writeLog();
    }
}
