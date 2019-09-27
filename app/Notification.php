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
            case 'partner': $causer = Partner::withTrashed()->findOrFail($this->data['causer']['id']);  break;
            case 'staff': $causer = Staff::withTrashed()->findOrFail($this->data['causer']['id']);  break; 
        }

        return $causer;
    }
    public function link()
    {
        return $this->data['link']; 
    }

}