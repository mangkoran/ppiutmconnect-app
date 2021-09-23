<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\News;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function allNews(Request $r)
    {
        $allNews = News::all()->sortBy('posted_on')->reverse();

        // Pass Post Collection to view
        return view('client.news', compact('allNews'));
    }

    public function singleNews(Request $r){
        $allNews = News::where('news_id', $r->id)->get();
        $news = $allNews[0];

        //Check if user can still participate
        $today = new Carbon;
        $posted = ($news->posted_on > $today);

        $newsDesc = [
            'news' => $news,
            'posted' => $posted,
        ];
        return view('client.view-news', compact('newsDesc'));
    }




    public function addNews(Request $r)
    {
        $today = new Carbon;

        $pic1 = $r->file('news_pic1');
        $pic2 = $r->file('news_pic2');
        $pic3 = $r->file('news_pic3');

        $pic1name = $pic1->getClientOriginalName();
        if ($pic2 != null) $pic2name = $pic2->getClientOriginalName();
        else $pic2name = null;
        if ($r->news_pic3 != null) $pic3name = $pic3->getClientOriginalName();
        else $pic3name = null;



        if ($r->isEditing == 1) {
            News::where('news_id', $r->news_id)->update([
                'news_title' => $r->news_title,
                'news_category'  => $r->news_category,
                'news_content' => $r->news_content,
                'posted_on' => $today,
                'news_pic1' => $pic1name,
                'news_pic2' => $pic2name,
                'news_pic3' => $pic3name,
            ]);

            $newPath = public_path() . '/images/news/' . $r->news_id;

            if ($pic1name != null) {
                News::where('news_id', $r->news_id)->update(['news_pic1' => $pic1name]);
                $pic1->move($newPath, $pic1name);
            }
            if ($pic2name != null) {
                News::where('news_id', $r->news_id)->update(['news_pic2' => $pic2name]);
                $pic2->move($newPath, $pic2name);
            }
            if ($pic3name != null) {
                News::where('news_id', $r->news_id)->update(['news_pic3' => $pic3name]);
                $pic3->move($newPath, $pic3name);
            }
        } else {
            $news = new News([
                'news_title' => $r->news_title,
                'news_category'  => $r->news_category,
                'news_content' => $r->news_content,
                'posted_on' => $today,
                'news_pic1' => $pic1name,
                'news_pic2' => $pic2name,
                'news_pic3' => $pic3name,
            ]);
            $news->save();

            $newPath = public_path() . '/images/news/' . $news->news_id;

            $pic1->move($newPath, $pic1name);
            if ($r->news_pic2 != null) $pic2->move($newPath, $pic2name);
            if ($r->news_pic3 != null) $pic3->move($newPath, $pic3name);
        }

        return redirect('table');
    }

    public function infoNews(Request $r)
    {
        $news = News::where('news_id', $r->id)->get();
        if (count($news) > 0) {
            $newsDesc = [
                'news' => $news[0],
                'isView' => true,
            ];

            return view('layouts.post.add_news', compact('newsDesc'));
        } else return redirect('table');
    }

    public function editNews(Request $r)
    {
        $news = News::where('news_id', $r->id)->get();
        if (count($news) > 0) {
            $newsDesc = [
                'news' => $news[0],
                'isEditing' => true,
            ];

            return view('layouts.post.add_news', compact('newsDesc'));
        } else return redirect('table');
    }

    public function deleteNews(Request $r)
    {
        News::where('news_id', $r->id)->delete();
        return redirect('table');
    }
}
