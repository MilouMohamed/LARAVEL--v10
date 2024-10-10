<?php

namespace App\Mail;

use App\Models\profile;
use Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProfileMail extends Mailable
{
    use Queueable, SerializesModels;

    private string $name;
    private string $email;
    /**
     * Create a new message instance.
     */
    // public function __construct($nameP ,$emailP)
    // {    $this->name=$nameP;
    // $this->email=$emailP;    } 
       public function __construct(private profile $profile)
    { 
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Email Confermation<h1>One</h1>',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $date_creat=$this->profile->created_at;
        $id=$this->profile->id;
        $href=url("")."/Verefy_email/".base64_encode($date_creat."///".$id);
        return new Content(
            view: 'emails.inscription',
            with:[
                "email"=>$this->profile->email,
                "name"=>$this->profile->name, 
                "href"=>$href,
            ]
        );

       /*v72 $body="ICI test de variable body";
        return new Content(
            view: 'emails.inscription',
            with:compact("body")
        );*/
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array 
    {
        return [
            // Attachment::fromStorage("public/profile/imgs/profile.JPG")// v 72
            // ->as("image.jpg")
            // ->withMime("image/jpg")
        ];
    }
}
