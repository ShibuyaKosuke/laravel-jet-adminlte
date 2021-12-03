<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Listeners;

use ShibuyaKosuke\LaravelJetAdminlte\Events\PasswordChangeEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Services\UserAgentSecurityService;

class PasswordChangeListener
{
    /**
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param PasswordChangeEvent $event
     * @return void
     */
    public function handle(PasswordChangeEvent $event)
    {
        (new UserAgentSecurityService($event))->writeLog();
    }
}
