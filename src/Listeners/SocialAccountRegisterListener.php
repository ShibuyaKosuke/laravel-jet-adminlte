<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Listeners;

use ShibuyaKosuke\LaravelJetAdminlte\Events\SocialAccountRegisterEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Services\UserAgentSecurityService;

class SocialAccountRegisterListener
{
    /**
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param SocialAccountRegisterEvent $event
     * @return void
     */
    public function handle(SocialAccountRegisterEvent $event)
    {
        (new UserAgentSecurityService($event->request))->writeLog();
    }
}
