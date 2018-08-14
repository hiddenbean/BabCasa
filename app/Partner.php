<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use this notification to sen an email to a specific user
use App\Notifications\ResetPasswordNotification;

class Partner extends Authenticatable
{
    use Notifiable;

    protected $guard = 'partner';

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token, 'partner'));
    }
}
