<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


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

    public function play() {

    }

    public function place() {

    }
}
