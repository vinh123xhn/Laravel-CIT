<?php

namespace App\Http\Controllers\Admin\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index() {
        $users = User::paginate(20);
    }

    public function getForm() {

    }

    public function saveForm() {

    }

    public function getDetail() {

    }
}
