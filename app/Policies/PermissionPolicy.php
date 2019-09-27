<?php

namespace App\Policies;

use App\staff;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    // Staff $staff,$type
    function read(Staff $staff,$type)
    {

        return $staff->profile->permissions->where('type',$type)->first()->pivot->can_read;
      
    }
    function write(Staff $staff,$type)
    {
        return $staff->profile->permissions->where('type',$type)->first()->pivot->can_write;
     
    }
}
