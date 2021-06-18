<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public $user;
    public $bulan;
    public $con;
    public function __construct($data,$user,$bulan,$con)
    {
        $this->data=$data;
        $this->user=$user;
        $this->bulan=$bulan;
        $this->con=$con;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Pesan')->markdown('emails.reminder.remind',[
            'data'=>$this->data,
            'user'=>$this->user,
            'bulan'=>$this->bulan,
            'con'=>$this->con]);
    }
    
}
