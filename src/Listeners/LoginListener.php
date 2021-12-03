<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Listeners;

use ShibuyaKosuke\LaravelJetAdminlte\Events\LoginEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Services\UserAgentSecurityService;

class LoginListener
{
    /**
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param LoginEvent $event
     * @return void
     */
    public function handle(LoginEvent $event)
    {
        (new UserAgentSecurityService($event))->writeLog();
    }
}
