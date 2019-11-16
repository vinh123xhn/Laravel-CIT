<?php

namespace App\Http\Controllers\Admin\Medical;

use App\Models\Children;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChildrenController extends Controller
{
    public function index() {
        $childrens = Children::get();
        return view('admin.medical.children.list')->with(compact('childrens'));
    }

    public function getForm() {
        return view('admin.medical.children.form');
    }

    public function saveForm(Request $request) {
        Children::create($request->all());
        return redirect()->route('admin.children.list');
    }

    public function getDetail() {

    }
}
