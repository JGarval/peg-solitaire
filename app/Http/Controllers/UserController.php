<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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

    /**
     * @return Returns all users
     */
    public function index() {
        return User::all();
    }

    /**
     * @param $id
     * @return Returns a user based on a single ID
     * Retrieves all users finded by id.
     * If user doesn't exist, throws a NotFoundHttpException
     * In other case, returns User
     */
    public function show($id) {
        $user = User::find($id);

        if (!$user) {
            throw new NotFoundHttpException;
        }

        return response()->json([
            'user' => $user
        ], 200);
    }

    /**
     * @param Request $request
     * @return Creates a new user
     * Creates new User and sets all request parameters.
     * If the saving is true the user is updated
     * In other case, returns user not found.
     */
    public function store(Request $request) {
        $user = new User;

        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = \Hash::make($request->input('password'));
        $user->enabled = $request->input('enabled');
        $user->isAdmin = $request->input('isAdmin');

        if ($user->save()) {
            return response()->json([
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

    }

    /**
     * @param Request $request
     * @param $id
     * @return Updates a user
     * Updates the instance of a user.
     */
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);

        if (!$user) {
            throw new NotFoundHttpException;
        }

        /**
         * TODO:
         * 1. ¿Cómo hacer el UPDATE específico?
         */

        if ($request == 'username') {

        } else if ($request == 'password') {

        } else if ($request == 'name') {

        } else if ($request == 'second_name') {

        } else if ($request == 'enabled') {

        } else if ($request == 'isAdmin') {

        } else if ($request == 'password') {

        } else if ($request == 'password') {

        } else if ($request == 'password') {

        }

        //$user->username = $request->input('username');
        //$user->email = $request->input('email');
        //$user->password = \Hash::make($request->input('password'));
        $user->enabled = $request->input('enabled');
        //$user->isAdmin = $request->input('isAdmin');

        if ($user->save()) {
            return response()->json([
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'message' => 'User not found'
            ], 400);
        }
    }

    /**
     * @param $id
     * @return Deletes a user
     */
    public function destroy($id) {
        $user = User::findOrFail($id);

        if (!$user) {
            throw new NotFoundHttpException;
        }

        if ($user->delete()) {
            return response()->json([
                'id' => $id
            ], 200);
        } else {
            return response()->json([
                'message' => 'User not found',
            ], 400);
        }
    }

    /**
     * @param $id
     * @return Returns allowed methods
     */
    public function options($id) {
        $headers = ['Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS'];
        return response()->make("",200, $headers);
    }
}
