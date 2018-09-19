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
        if(isset($staff->profile->permissions->where('type',$type)->first()->pivot->can_read))
        return $staff->profile->permissions->where('type',$type)->first()->pivot->can_read;
        else 
        return false;
    }
    function write(Staff $staff,$type)
    {
        if(isset($staff->profile->permissions->where('type',$type)->first()->pivot->can_write))
        return $staff->profile->permissions->where('type',$type)->first()->pivot->can_write;
        else 
        return false;
    }
}
