<?php

namespace App\Listeners;

use App\Events\SeriesCreated as EventsSeriesCreated;
use App\Mail\SeriesCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailUsersSeriesCreated implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EventsSeriesCreated $event): void
    {
        $userList = User::all();

        foreach ($userList as $i => $user) {
            $email = new SeriesCreated($event->name);

            $when = now()->addSecond($i * 5);

            Mail::to($user)->later($when, $email);
        }
    }
}
