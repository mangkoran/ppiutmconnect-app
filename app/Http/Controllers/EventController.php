<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Feedback;
use App\Models\Member;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;

class EventController extends Controller
{
    public function allEventMember(Request $r){
        $events = Event::all()->sortBy('posted_on')->reverse();

        return view('client.events', compact('events'));
    }
    public function allEventManagement(Request $r){
        $events = Event::all()->sortBy('posted_on')->reverse();
        $finishedEvents = array();
        $today = new Carbon;

        for($i = 0; $i < count($events); $i++){
            if($events[$i]->event_date <= $today){
                $finishedEvents[$i] = $events[$i];
            }
        }

        return view('layouts.feedback.feedback', compact('finishedEvents'));
    }


    public function anEventMember(Request $r){
        $events = Event::where('event_id', $r->id)->get();
        $event = $events[0];

        //Check if user can still participate
        $today = new Carbon;
        $open = ($event->closed_on > $today);

        //Check if user can give feedback (After the event ended)
        $done = ($event->event_date <= $today);

        //Feedback
        $feedback = Feedback::where('event_id', $event->event_id)
                                ->orderBy('comment_on', 'desc')
                                ->get();

        //Assign user to the respective feedback
        $users = array();
        for($i = 0; $i < count($feedback); $i++){
            $users[$i] = Member::where('matrix_card', $feedback[$i]->matrix_card_feedback)->get()[0];
        }

        //Check if user already give feedback
        $check = Feedback::where([
            'matrix_card_feedback' => auth()->user()->matrix_card,
            'event_id' => $event->event_id,
        ])->get();

        $eventDesc = [
            'event' => $event,
            'open' => $open,
            'done' => $done,
            'feedback' => $feedback,
            'users' => $users,
            'check' => count($check),
        ];
        return view('client.view-event', compact('eventDesc'));
    }


    public function addEvent(Request $r){
        $today = new Carbon;

        $pic1 = $r->file('e_pic1');
        $pic2 = $r->file('e_pic2');
        $pic3 = $r->file('e_pic3');

        if($pic1 != null) $pic1name = $pic1->getClientOriginalName();
        else if($pic1 == null && $r->isEditing == 1) $pic1name = null;
        if($pic2 != null) $pic2name = $pic2->getClientOriginalName();
        else $pic2name = null;
        if($r->e_pic3 != null) $pic3name = $pic3->getClientOriginalName();
        else $pic3name = null;


        if($r->isEditing == 1){
            Event::where('event_id', $r->e_id)->update([
                'event_title' => $r->e_title,
                'event_category' => $r->e_category,
                'event_venue' => $r->e_venue,
                'posted_on' => $today,
                'open_for' => $r->e_open_for,
                'closed_on' => $r->e_closed_on,
                'event_details' => $r->e_details,
                'event_url' => $r->e_url,
                'event_date' => $r->e_date,
            ]);

            $newPath = public_path() . '/images/event/' . $r->e_id;

            if($pic1name != null){
                Event::where('event_id', $r->e_id)->update(['event_pic1' => $pic1name]);
                $pic1->move($newPath, $pic1name);
            }if($pic2name != null){
                Event::where('event_id', $r->e_id)->update(['event_pic2' => $pic2name]);
                $pic2->move($newPath, $pic2name);
            }if($pic3name != null){
                Event::where('event_id', $r->e_id)->update(['event_pic3' => $pic3name]);
                $pic3->move($newPath, $pic3name);
            }
        }else{
            $event = new Event([
                'event_title' => $r->e_title,
                'event_category' => $r->e_category,
                'event_venue' => $r->e_venue,
                'posted_on' => $today,
                'open_for' => $r->e_open_for,
                'closed_on' => $r->e_closed_on,
                'event_details' => $r->e_details,
                'event_url' => $r->e_url,
                'event_date' => $r->e_date,
                'event_pic1' => $pic1name,
                'event_pic2' => $pic2name,
                'event_pic3' => $pic3name,
            ]);
            $event->save();

            $newPath = public_path() . '/images/event/' . $event->event_id;

            $pic1->move($newPath, $pic1name);
            if($r->e_pic2 != null) $pic2->move($newPath, $pic2name);
            if($r->e_pic3 != null) $pic3->move($newPath, $pic3name);
        }

        return redirect('table');
    }

    public function infoEvent(Request $r){
        $event = Event::where('event_id', $r->id)->get();
        if(count($event) > 0){
            $eventDesc = [
                'event' => $event[0],
                'isView' => true,
            ];

            return view('layouts.post.add_post', compact('eventDesc'));
        }
        else return redirect('table');
    }

    public function editEvent(Request $r){
        $event = Event::where('event_id', $r->id)->get();
        if(count($event) > 0){
            $eventDesc = [
                'event' => $event[0],
                'isEditing' => true,
            ];

            return view('layouts.post.add_post', compact('eventDesc'));
        }
        else return redirect('table');
    }

    public function deleteEvent(Request $r){
        Event::where('event_id', $r->id)->delete();
        return redirect('table');
    }
}
