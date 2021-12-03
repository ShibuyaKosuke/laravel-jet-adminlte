<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Services;

use Illuminate\Http\Request;
use Jenssegers\Agent\Facades\Agent;
use ShibuyaKosuke\LaravelJetAdminlte\Models\UserAgent as Model;

class UserAgentSecurityService
{
    /**
     * @var mixed
     */
    private mixed $event;

    /**
     * @var Request
     */
    private Request $request;

    /**
     * @var Agent
     */
    private Agent $agent;

    /**
     * @var string|null
     */
    private ?string $route;

    /**
     * @param mixed $event
     */
    public function __construct($event)
    {
        $this->event = $event;
        $this->request = $event->request;
        $route = $this->request->route();
        $this->route = $route->getName();
        $this->agent = new Agent();
    }

    /**
     * @return void
     */
    public function writeLog(): void
    {
        $user_agent = $this->agent::getUserAgent();

        if ($this->agent::isMobile()) {
            $device_type = 'mobile';
        } elseif ($this->agent::isTablet()) {
            $device_type = 'tablet';
        } else {
            $device_type = 'laptop';
        }

        $device = $this->agent::device();

        $platform = $this->agent::platform();
        $platform_version = $this->agent::version($platform, \Jenssegers\Agent\Agent::VERSION_TYPE_STRING);

        $browser = $this->agent::browser();
        $browser_version = $this->agent::version($browser, \Jenssegers\Agent\Agent::VERSION_TYPE_STRING);

        if (is_null($this->request->user())) {
            return;
        }

        $hash = hash('sha256', $user_agent);

        Model::updateOrCreate([
            'user_id' => $this->request->user()->id,
            'hash' => $hash,
            'event' => get_class($this->event),
            'deleted_at' => null
        ], [
            'user_id' => $this->request->user() ? $this->request->user()->id : null,
            'user_agent' => $user_agent,
            'hash' => $hash,
            'event' => get_class($this->event),
            'remote_ip' => $this->request->ip(),
            'device_type' => $device_type,
            'device' => $device,
            'platform' => $platform,
            'platform_version' => $platform_version,
            'browser' => $browser,
            'browser_version' => $browser_version,
            'updated_at' => now()
        ]);
    }
}
