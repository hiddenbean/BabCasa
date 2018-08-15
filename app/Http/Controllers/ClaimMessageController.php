<?php

namespace App\Http\Controllers;

use App\Partner;
use App\ClaimMessage;
use App\Subject;
use Auth;
use DateTime;
use App\Claim;
use Illuminate\Database\Eloquent\Model;

class ClaimMessageController extends Model
{
    public function __construst()
    {
        //
    }

    public function store($claim, $user, $message)
    {
        $message_writer=$claim->claimable;
        $claim_message=ClaimMessage::create([
            'message' => $message,
            'status' => true,
            'claim_messageable_type' => $user,
            'claim_messageable_id' => $message_writer->id,
            'claim_id' => $claim->id,
        ]);
        $messages = $claim->claimMessages;
        $subject=$claim->subject;
        return view('claims.show', [
            'claim'=>$claim,
            'messages'=>$messages,
            'subject'=>$subject->title,
            ]);
    }


}
