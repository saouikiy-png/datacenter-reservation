<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Event;
use App\Models\Log;

class EventServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Event::listen(Login::class, function ($event) {
            Log::create([
                'action' => 'User Login',
                'user_id' => $event->user->id,
                'description' => 'User logged in'
            ]);
        });
    }
}
