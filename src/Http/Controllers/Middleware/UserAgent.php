<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Http\Controllers\Middleware;

use Illuminate\Http\Request;
use Jenssegers\Agent\Facades\Agent;
use ShibuyaKosuke\LaravelJetAdminlte\Models\UserAgent as Model;

class UserAgent
{
    /**
     * @var Request
     */
    private Request $request;

    public function handle(Request $request, \Closure $next)
    {
        $this->request = $request;
        $response = $next($this->request);
        $this->writeLog();
        return $response;
    }

    /**
     * @return void
     */
    private function writeLog(): void
    {
        $user_agent = Agent::getUserAgent();

        $device = Agent::device();

        $platform = Agent::platform();
        $platform_version = Agent::version($platform, \Jenssegers\Agent\Agent::VERSION_TYPE_STRING);

        $browser = Agent::browser();
        $browser_version = Agent::version($browser, \Jenssegers\Agent\Agent::VERSION_TYPE_STRING);

        if (is_null($this->request->user())) {
            return;
        }

        Model::updateOrCreate([
            'user_id' => $this->request->user()->id,
            'hash' => hash('sha256', $user_agent),
            'deleted_at' => null
        ], [
            'user_id' => $this->request->user() ? $this->request->user()->id : null,
            'user_agent' => $user_agent,
            'hash' => hash('sha256', $user_agent),
            'remote_ip' => $this->request->ip(),
            'device' => $device,
            'platform' => $platform,
            'platform_version' => $platform_version,
            'browser' => $browser,
            'browser_version' => $browser_version,
            'updated_at' => now()
        ]);
    }
}
