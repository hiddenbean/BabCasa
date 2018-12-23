<?php

namespace App;
use App\Staff;
use App\Partner;
use App\Business;
use App\ParticularClient;

use Illuminate\Notifications\DatabaseNotification;

class Notification extends DatabaseNotification
{
      /**
     * Get the entity's notifications.
     */
    public function notifiable()
    {
        return $this->morphTo();
    }

    public function causer()
    {
        switch ($this->data['causer']['type']) {
            case 'partner': return Partner::findOrFail($this->data['causer']['id']);  break;
            case 'staff': return Staff::findOrFail($this->data['causer']['id']);  break; 
        }
    }
    public function link()
    {
        return $this->data['link']; 
    }

}