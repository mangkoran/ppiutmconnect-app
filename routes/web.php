<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Models\Event;
use App\Models\Feedback;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/check_user', [LoginController::class, 'check_user'])->name('check_user');
Route::post('/sendEmail', [EmailController::class, 'sendEmail'])->name('sendEmail');

Route::get('/cobaBlast', function () {
    return view('try_email');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //client
    Route::get('/user', function () {
        return view('client.index');
    });
    Route::get('/user-home', [MemberController::class, 'index'])->name('user-home');

    Route::get('/user-news', [NewsController::class, 'allNews'])->name('user-news');
    Route::get('/user-view-news/{id}', [NewsController::class, 'singleNews'])->name('user-view-news');

    Route::get('/user-events', [EventController::class, 'allEventMember'])->name('user-events');
    Route::get('/user-view-event/{id}', [EventController::class, 'anEventMember'])->name('user-view-event');
    Route::post('/addFeedback', [FeedbackController::class, 'addFeedback'])->name('addFeedback');

    Route::get('/user-academic', function(){
        return view('client.academic');
    });
    Route::get('/user-elibrary', function(){
        return view('client.elibrary');
    });
    Route::get('/user-about', function(){
        return view('client.about');
    });
    Route::get('/user-aspiration', function(){
        return view('client.aspiration');
    });

    Route::get('/user-profile', function(){
        return view('client.profile');
    })->name('user-profile');
    Route::get('/user-editprofile', function(){
        return view('client.editprofile');
    });
    Route::post('/updateProfile', [MemberController::class, 'updateProfile'])->name('updateProfile');

    Route::get('/user-signup', function(){
        return view('client.signup');
    });

    //This exclusive for ADMIN
    Route::middleware(['admin'])->group(function () {
        Route::get('admin', [AdminController::class, 'index'])->name('home');
        Route::post('/changeGrant', [AdminController::class, 'changeGrant'])->name('changeGrant');
        Route::post('/memberCSV', [MemberController::class, 'memberCSV'])->name('memberCSV');
    });

    //This exclusive for MANAGEMENT
    Route::middleware(['management'])->group(function () {
        Route::get('management', [ManagementController::class, 'index'])->name('home');

        Route::get('/profile', [ManagementController::class, 'profilePage'])->name('profile');

        //Academic Library
        Route::get('/academic', function () {
            return view('academic');
        });

        //upload library
        Route::post('/uploadLib', [App\Http\Controllers\AcademicLibController::class, 'upload'])->name('upload');

        //forms
        Route::get('/register', function () {
            return view('register');
        })->name('register');

        //Posts
        Route::get('/addNews', function () {
            return view('layouts.post.add_news');
        });
        Route::post('/addNews', [NewsController::class, 'addNews'])->name('addNews');
        Route::get('/infoNews/{id}', [NewsController::class, 'infoNews'])->name('infoNews');
        Route::get('/editNews/{id}', [NewsController::class, 'editNews'])->name('editNews');
        Route::post('/deleteNews', [NewsController::class, 'deleteNews'])->name('deleteNews');

        Route::get('/addPost', [PostController::class, 'addPost'])->name('addPost');
        Route::get('/infoEvent/{id}', [EventController::class, 'infoEvent'])->name('infoEvent');
        Route::get('/editEvent/{id}', [EventController::class, 'editEvent'])->name('editEvent');
        Route::post('/addEvent', [EventController::class, 'addEvent'])->name('addEvent');
        Route::post('/deleteEvent', [EventController::class, 'deleteEvent'])->name('deleteEvent');

        Route::get('/contentList', function () {
            return view('layouts.post.content_list');
        });
        Route::get('/table', [PostController::class, 'allPost'])->name('table');


        //blasting
        Route::post('/addBlasting', [CampaignController::class, 'campaignSession'])->name('addBlasting');
        Route::post('/tempImg', [CampaignController::class, 'addImg'])->name('tempImg');
        Route::post('/renderTemplate', [CampaignController::class, 'renderTemplate'])->name('renderTemplate');

        // Route::get('/chooseRecipients', function () {
        //     return view('layouts.blasting.choose_recipients');
        // });
        Route::post('/sendBlasting', [CampaignController::class, 'sendCampaign'])->name('sendBlasting');
        Route::get('/chooseRecipients', [CampaignController::class, 'contactList'])->name('chooseRecipients');
        Route::get('/listBlasting', [CampaignController::class, 'campaignList'])->name('listBlasting');
        Route::get('/makeTemplate', function () {
            return view('layouts.blasting.make_template');
        });
        Route::get('/manageBlast', function () {
            return view('layouts.blasting.manage_blast');
        });


        //feedback
        Route::get('/feedbackDetails/{id}', [FeedbackController::class, 'anEventFeedback'])->name('feedbackDetails');
        Route::get('/feedback', [EventController::class, 'allEventManagement'])->name('feedback');
    });

    //This exclusive for MEMBER
    Route::middleware(['member'])->group(function () {
        Route::get('member', [MemberController::class, 'index'])->name('home');
    });

    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

});

