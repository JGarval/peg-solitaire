<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     *  GET         - /photos               - index
     *  GET         - /photos/create        - create
     *  POST        - /photos               - store
     *  GET         - /photos/{photo}       - show
     *  GET         - /photos/{photo}/edit  - edit
     *  PUT/PATCH   - /photos/{photo}       - update
     *  DELETE      - /photos/{photo}       - destroy
     */

    public function index() {}
    public function create() {}
    public function store() {}
    public function show($id) {}
    public function edit($id) {}
    public function update($id) {}
    public function destroy($id) {}

    public function isAdmin() {
        if (Auth::User()->isAdmin) {
            return view('admin.admin');
        } else {
            return redirect()->route('home');
        }
    }
}
