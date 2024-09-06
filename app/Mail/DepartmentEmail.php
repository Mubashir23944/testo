<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DepartmentEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailData;

    public function __construct($emailData)
    {
        $this->emailData = $emailData;
    }

    public function build()
    {
        return $this->view('emails.department')
            ->with([
                'messageContent' => $this->emailData['message'],
            ])
            ->to($this->emailData['to'])
            ->cc($this->emailData['cc'] ?? [])
            ->bcc($this->emailData['bcc'] ?? [])
            ->subject('Departmental Update');
    }
}