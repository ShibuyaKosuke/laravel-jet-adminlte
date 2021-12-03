<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Events;

use Illuminate\Http\Request;

class SocialAccountDetachedEvent
{
    /**
     * The throttled request.
     *
     * @var Request
     */
    public Request $request;

    /**
     * Create a new event instance.
     *
     * @param Request $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
