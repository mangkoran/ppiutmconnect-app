<?php

namespace App\Http\Controllers;

use App\Models\Management;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagementController extends Controller
{
    public function index()
    {
        return view('main_dashboard');
    }
    public function profilePage(Request $r){
        $management = Management::where('management_matrix_card', Auth::user()->matrix_card)->get();
        $role = Role::where('role_id', $management[0]->management_role_id)->get();
        $user_desc = [
            'management_desc' => $management[0],
            'role_desc' => $role[0],
        ];

        return view('profile', compact('user_desc'));
    }
}
