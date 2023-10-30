<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterEmail extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   */
  private $user;

  public function __construct(User $user)
  {

    $this->user = $user;
  }

  /**
   * Get the message envelope.
   */
  public function envelope(): Envelope
  {
    return new Envelope(
      subject: 'Register Email',
    );
  }

  /**
   * Get the message content definition.
   */
  public function content(): Content
  {

    $this->subject('Assunto do e-mail');
    $this->from('reply@gmail.com', 'Reply Bot');
    $this->replyTo('kobsdev2019@gmail.com');
    $name = $this->user->name;

    return (new Content)
      ->view('Mail.registerMail')
      ->with(compact('name'));
  }

  /**
   * Get the attachments for the message.
   *
   * @return array<int, \Illuminate\Mail\Mailables\Attachment>
   */
  public function attachments(): array
  {


    return [
      Attachment::fromPath(__DIR__ . "/../../public/boneco.png")
        ->as('404.png')

    ];
  }
}
