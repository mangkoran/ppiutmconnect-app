<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $members = Member::all();

        return view('admin.index', compact('members'));
    }

    public function changeGrant(Request $r){
        $index = $r->submit;
        $matrix_card = $r->id;
        $newRole = $r->role[0];

        $user = Member::where('matrix_card', $matrix_card)
        ->update([
            'access_grant' => $newRole,
        ]);
        // return $r;
        return redirect('home');
    }
}
