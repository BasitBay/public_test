<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\EnrollmentSuccessful;
use App\Mail\EnrollmentConfirmation;
use Illuminate\Support\Facades\Mail;


class SendEnrollmentConfirmationEmail implements ShouldQueue
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
    public function handle(EnrollmentSuccessful $event): void
    {
        //
        Mail::to($event->email)->send(new EnrollmentConfirmation($event->course));
    }
}
