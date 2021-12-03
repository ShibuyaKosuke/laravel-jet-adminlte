<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Listeners;

use ShibuyaKosuke\LaravelJetAdminlte\Events\SocialAccountLoginEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Services\UserAgentSecurityService;

class SocialAccountLoginListener
{
    /**
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param SocialAccountLoginEvent $event
     * @return void
     */
    public function handle(SocialAccountLoginEvent $event)
    {
        (new UserAgentSecurityService($event))->writeLog();
    }
}
