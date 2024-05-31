<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Course;


class EnrollmentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $course;

    /**
     * Create a new message instance.
     */
    public function __construct(Course $course)
    {
        //
        $this->course = $course;
    }

    public function build()
    {
        return $this->subject('Successfully enrolled in a course')
                    ->view('emails.enrollment_confirmation');
    }

    /*
     * Get the message envelope.
     *
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Enrollment Confirmation',
        );
    }*/

    /*
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.enrollment_confirmation',
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
