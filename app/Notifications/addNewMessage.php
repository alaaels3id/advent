<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Contact;

class addNewMessage extends Notification
{
    use Queueable;

    protected $contact;
    
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function via($notifiable)
    {
        return ['database'];
    }
    
    public function toArray($notifiable)
    {
        return [
            'name'       => $this->contact->co_name,
            'type'       => contacts()[$this->contact->co_type],
            'image'      => $this->contact->image,
            'message'    => $this->contact->co_message,
            'subject'    => $this->contact->co_subject,
            'created_at' => $this->contact->created_at->diffForHumans(),
            'id'         => $this->contact->id,
        ];
    }
}
