<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(Request $request) {
        $user = $request->session()->get('user');
        return view('admin.dashboard', compact('user'));
    }
}
