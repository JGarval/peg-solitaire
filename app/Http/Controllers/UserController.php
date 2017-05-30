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

        return $user;
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
                'msg'=>'User updated!',
                'users'=>$user
            ], 200);
        } else {
            return response()->json([
                'msg'=>'User not found'
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

        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = \Hash::make($request->input('password'));
        $user->enabled = $request->input('enabled');
        $user->isAdmin = $request->input('isAdmin');

        if ($user->save()) {
            return response()->json([
                'msg'=>'User updated!',
                'users'=>$user
            ], 200);
        } else {
            return response()->json([
                'msg'=>'User not found'
            ], 404);
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
                'msg'=>'User destroyed!',
                'id'=>$id
            ], 200);
        } else {
            return response()->json([
                'msg'=>'User not found',
            ], 200);
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
