<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\ReminderEmail;
use Illuminate\Support\Facades\Mail;

class SendReminderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $course;
    public $email;
    public $reminderNumber;

    /**
     * Create a new job instance.
     */
    public function __construct($course, $email, $reminderNumber)
    {
        //
        $this->course = $course;
        $this->email = $email;
        $this->reminderNumber = $reminderNumber;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        Mail::to($this->email)->send(new ReminderEmail($this->course, $this->reminderNumber));

    }
}
