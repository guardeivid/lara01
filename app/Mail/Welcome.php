<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;

//php artisan make:mail Welcome

class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    //para que pueda acceder la vista
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //se puede pasar user ->with('user' => $this->user) o automaticamente ya lo inyecta
        return $this->view('emails.welcome');
    }
}
