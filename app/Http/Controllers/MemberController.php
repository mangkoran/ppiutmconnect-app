<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $events3 = array();
        for($i = 0; $i < count($events); $i++){
            $events3[$i] = $events[$i];
            if($i == 5){ break; }
        }
        $allNews = News::all();
        $news3 = array();
        for($i = 0; $i < count($allNews); $i++){
            $news3[$i] = $allNews[$i];
            if($i == 5){ break; }
        }

        $member = [
            'events3' => $events3,
            'news3' => $news3,
        ];

        return view('client.index', compact('member'));
    }

    public function updateProfile(Request $r){
        $this->validate($r, [
            'email' => 'required|email',
            'address' => 'required'
        ]);

        $route = $r->get('route');
        $user = Member::where('matrix_card', Auth::user()->matrix_card)
        ->update([
            'email' => $r->get('email'),
            'address' =>$r->get('address'),
        ]);

        return redirect($route);
    }

    public function memberCSV(Request $r){
        $csv_file = $r->file('csv_file');
        $file_extension = $csv_file->getClientOriginalExtension();

        if($file_extension == 'csv'){
            $file_data = array_map('str_getcsv', file($csv_file->getRealPath()));

            $first_row = array();
            if(count($file_data[0]) == 1)
                $first_row = explode(';', $file_data[0][0]);
            else if(count($file_data[0]) > 1)
                $first_row = $file_data[0];

            $temp_member = array();
            for($i = 1; $i < count($file_data); $i++){
                $temp_array = array();
                if(count($file_data[0]) == 1)
                    $temp_array = explode(';', $file_data[$i][0]);
                else if(count($file_data[0]) > 1)
                    $temp_array = $file_data[$i];

                if($temp_array[0] == ''){
                    break;
                }

                $temp_member[$i] = new Member();
                for($j = 0; $j < count($first_row); $j++){
                    if(trim($first_row[$j] == '')){
                        break;
                    }
                    $temp_member[$i]->{trim($first_row[$j])} = $temp_array[$j];
                }
                $temp_member[$i]->access_grant = 1;
                $temp_member[$i]->password = bcrypt("ppiutm123");

                $temp_member[$i]->save();
            }

            return redirect('home');
        }
    }
}
