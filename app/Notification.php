<?php

namespace App;

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
}