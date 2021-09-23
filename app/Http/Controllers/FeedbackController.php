<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Feedback;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function anEventFeedback(Request $r){
        $event = Event::where('event_id', $r->id)->get();
        $event = $event[0];

        $feedback = Feedback::where('event_id', $event->event_id)
            ->orderBy('comment_on', 'desc')
            ->get();

        $users = array();
        for($i = 0; $i < count($feedback); $i++){
            $users[$i] = Member::where('matrix_card', $feedback[$i]->matrix_card_feedback)->get()[0];
        }

        $details = [
            'event' => $event,
            'feedback' => $feedback,
            'users' => $users,
        ];

        // return $details;
        return view('layouts.feedback.feedback_details', compact('details'));
    }

    public function addFeedback(Request $r){
        //Check if user already give feedback
        $check = Feedback::where([
            'matrix_card_feedback' => auth()->user()->matrix_card,
            'event_id' => $r->event_id,
        ])->get();
        if(count($check) == 0){
            $today = new Carbon;

            $newFeed = new Feedback([
                'matrix_card_feedback' => auth()->user()->matrix_card,
                'comment_on' => $today,
                'event_id' => $r->event_id,
                'feedback' => $r->feedback,
                'rate_event' => $r->rate,
            ]);
            $newFeed->save();
        }
        return redirect()->route('user-view-event', $r->event_id);
    }
}
