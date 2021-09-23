<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function allPost(Request $r){
        $events = Event::all();
        $news = News::all();

        if(count($events) == null && count($news) == 0) $posts = [];
        else if(count($events) == null) $posts = $news;
        else if(count($news) == null) $posts = $events;
        else $posts = array_merge($events->toArray(), $news->toArray());

        $sortedPosts = collect($posts)->sortBy('posted_on')->toArray();
        //This is to sort if to the newest
        //Problem is the view keep resorting it probably there is feature there
        $sortedPosts = array_reverse($sortedPosts);

        $open = array();
        $today = new Carbon;
        //Check if the event is closed
        for($i = 0; $i < count($sortedPosts); $i++){
            if(isset($sortedPosts[$i]['event_id'])){
                if($sortedPosts[$i]['closed_on'] > $today){
                    $open[$i] = true;
                }else{ $open[$i] = false; }
            }else{ $open[$i] = null; }
        }

        $table = [
            'sortedPosts' => $sortedPosts,
            'open' => $open,
        ];

        return view('layouts.post.table', compact('table'));
    }

    public function addPost(Request $r){
        $eventDesc = [
            'event' => null,
        ];
        return view('layouts.post.add_post', compact('eventDesc'));
    }
}
