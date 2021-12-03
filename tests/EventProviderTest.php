<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Test;

use Illuminate\Events\Dispatcher;
use ShibuyaKosuke\LaravelJetAdminlte\Events\LoginEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\LogoutEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\SocialAccountDetachedEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\SocialAccountRegisterEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\TwoFactorAuthEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\TwoFactorRegisterEvent;

class EventProviderTest extends TestCase
{
    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function testEvents()
    {
        /** @var Dispatcher $dispatcher */
        $dispatcher = $this->app->get('events');

        $this->assertTrue($dispatcher->hasListeners(LoginEvent::class));
        $this->assertTrue($dispatcher->hasListeners(LogoutEvent::class));
        $this->assertTrue($dispatcher->hasListeners(TwoFactorAuthEvent::class));
        $this->assertTrue($dispatcher->hasListeners(TwoFactorRegisterEvent::class));
        $this->assertTrue($dispatcher->hasListeners(SocialAccountRegisterEvent::class));
        $this->assertTrue($dispatcher->hasListeners(SocialAccountDetachedEvent::class));
    }
}
