<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ajax;

class BackofficeContoller extends Controller
{
    /**
     * 
     */
    public function drawer (Request $request) {

        $value = $request->session()->get('drawer', 'false');
        $value ? $request->session()->put('drawer', false) : $request->session()->put('drawer', true);
        
        return Ajax::jsonResponse();
    }
}
