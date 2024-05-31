<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Course;

class ReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $course;
    public $reminderNumber;

    /**
     * Create a new message instance.
     */
    public function __construct(Course $course, $reminderNumber)
    {
        //
        $this->course = $course;
        $this->reminderNumber = $reminderNumber;
    }

    public function build()
    {
        return $this->subject("Reminder {$this->reminderNumber} for course {$this->course->title}")
                    ->view('emails.reminder');
    }

    /** not needed currently
     * Get the message envelope.
     */
    /*public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reminder Email',
        );
    }*/

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.reminder',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
