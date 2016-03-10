<?php

namespace Bryo\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Bryo\Events\SomeEvent' => [
            'Bryo\Listeners\EventListener',
        ],
    ];
}
