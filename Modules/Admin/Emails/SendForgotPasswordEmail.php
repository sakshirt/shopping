<?php

namespace Modules\Admin\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendForgotPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('admin::emails.forgot-password')
                    ->from($this->data['from'], $this->data['name'])
//                    ->cc()
//                    ->bcc()
//                    ->replyTo()
                    ->subject($this->data['subject'])
                    ->with(['body' => $this->data['body']]);
    }
}
