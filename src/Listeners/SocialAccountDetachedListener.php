<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Listeners;

use ShibuyaKosuke\LaravelJetAdminlte\Events\SocialAccountDetachedEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Services\UserAgentSecurityService;

class SocialAccountDetachedListener
{
    /**
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param SocialAccountDetachedEvent $event
     * @return void
     */
    public function handle(SocialAccountDetachedEvent $event)
    {
        (new UserAgentSecurityService($event->request))->writeLog();
    }
}
