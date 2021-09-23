<?php

namespace Database\Seeders;

use App\Models\GrantAccess;
use App\Models\Admin;
use App\Models\Management;
use App\Models\Member;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grant_access')->insert([
            [
                'grant_id' => 1,
                'grant_desc' => 'member',
            ],[
                'grant_id' => 2,
                'grant_desc' => 'management',
            ],[
                'grant_id' => 3,
                'grant_desc' => 'admin',
            ]
        ]);
        DB::table('admin')->insert([
            'matrix_card' => 'm3matric',
            'admin_year' => 2020
        ]);
        DB::table('role')->insert([
            'role_id' => 1,
            'role_desc' => 'leader'
        ]);
        DB::table('member')->insert([
            [
                'matrix_card' => 'm1matric',
                'name' => 'm1name',
                'email' => 'todopsain11@gmail.com',
                'password' => bcrypt('m1password'),
                'batch' => 2020,
                'program_code' => 'm1program_code',
                'degree' => 'm1degree',
                'address' => 'm1address',
                'access_grant' => 1,
            ],[
                'matrix_card' => 'm2matric',
                'name' => 'm2name',
                'email' => 'technoinfosys05@gmail.com',
                'password' => bcrypt('m2password'),
                'batch' => 2020,
                'program_code' => 'm2program_code',
                'degree' => 'm2degree',
                'address' => 'm2address',
                'access_grant' => 2,
            ],[
                'matrix_card' => 'm3matric',
                'name' => 'm3name',
                'email' => 'shikifujin11@protonmail.ch',
                'password' => bcrypt('m3password'),
                'batch' => 2020,
                'program_code' => 'm3program_code',
                'degree' => 'm3degree',
                'address' => 'm3address',
                'access_grant' => 3,
            ]
        ]);
        DB::table('management')->insert([
            'management_matrix_card' => 'm2matric',
            'management_year' => 2020,
            'management_role_id' => 1,
            'division_name' => 'div1',
        ]);

        DB::table('event')->insert([
            'event_id' => 1,
            'event_title' => 'e1title',
            'event_category'=> 'Sport',
            'event_venue' => 'e1venue',
            'posted_on' => Carbon::parse('2021-03-03'),
            'open_for' => 'Participants',
            'closed_on' => Carbon::parse('2021-04-04'),
            'event_details' => 'e1details',
            'event_url' => 'https://form.typeform.com/to/bOOqUGlh?typeform-medium=embed-snippet',
            'event_date' => Carbon::parse('2021-05-05'),
            'event_pic1' => 'e1pic1.PNG',
            'event_pic2' => 'e1pic2.PNG',
            'event_pic3' => 'e1pic3.PNG',
        ]);

        DB::table('event')->insert([
            'event_id' => 2,
            'event_title' => 'e2title',
            'event_category'=> 'Academic',
            'event_venue' => 'e2venue',
            'posted_on' => Carbon::parse('2021-10-10'),
            'open_for' => 'Committee',
            'closed_on' => Carbon::parse('2021-11-11'),
            'event_details' => 'e2details',
            'event_url' => 'https://form.typeform.com/to/sWBiD0dR?typeform-medium=embed-snippet',
            'event_date' => Carbon::parse('2021-12-12'),
            'event_pic1' => 'e2pic1.PNG',
            'event_pic2' => NULL,
            'event_pic3' => 'e2pic3.PNG',
        ]);

        DB::table('event')->insert([
            'event_id' => 3,
            'event_title' => 'e3title',
            'event_category'=> 'Human Dev',
            'event_venue' => 'e3venue',
            'posted_on' => Carbon::parse('2022-04-04'),
            'open_for' => 'Committee',
            'closed_on' => Carbon::parse('2022-05-05'),
            'event_details' => 'e3details',
            'event_url' => 'https://form.typeform.com/to/KFeb422q?typeform-medium=embed-snippet',
            'event_date' => Carbon::parse('2022-06-06'),
            'event_pic1' => 'e3pic1.PNG',
            'event_pic2' => 'e3pic2.PNG',
            'event_pic3' => NULL,
        ]);

        DB::table('member')->insert([
            'matrix_card' => 'm4matric',
            'name' => 'm4name',
            'email' => 'barongobber@gmail.com',
            'password' => bcrypt('m4password'),
            'batch' => 2020,
            'program_code' => 'm4program_code',
            'degree' => 'm4degree',
            'address' => 'm4address',
            'access_grant' => 1,
        ]);

        DB::table('feedback')->insert([
            [
                'matrix_card_feedback' => 'm1matric',
                'comment_on' => Carbon::parse('2021-05-06'),
                'event_id' => 1,
                'feedback' => 'feedback1',
                'rate_event' => 5,
            ],[
                'matrix_card_feedback' => 'm3matric',
                'comment_on' => Carbon::parse('2021-05-08'),
                'event_id' => 1,
                'feedback' => 'feedback2',
                'rate_event' => 4,
            ],[
                'matrix_card_feedback' => 'm4matric',
                'comment_on' => Carbon::parse('2021-05-07'),
                'event_id' => 1,
                'feedback' => 'feedback3',
                'rate_event' => 3,
        ]]);

        DB::table('news')->insert([
            [
            'news_id' => 1,
            'news_category' => 'Sport',
            'news_title' => 'n1title',
            'news_content' => 'n1content',
            'posted_on' => Carbon::parse('2021-06-06'),
            'news_pic1' => 'n1pic.PNG',
            'news_pic2' => NULL,
            'news_pic3' => NULL,]]);
            
        DB::table('campaign_list')->insert([
            [
                'campaign_id'=> 1,
                'campaign_name'=>'Halo',
                'subject'=>'Ya Hallo',
                'total_participant'=>69,
            ],
            [
                'campaign_id'=> 2,
                'campaign_name'=>'Halo2',
                'subject'=>'Ya Hallo2',
                'total_participant'=>420,
            ]
        ]);
    }
}
