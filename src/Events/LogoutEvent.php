<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Events;

use Illuminate\Http\Request;

class LogoutEvent
{
    /**
     * The throttled request.
     *
     * @var \Illuminate\Http\Request
     */
    public $request;

    /**
     * Create a new event instance.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
