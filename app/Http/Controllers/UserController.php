<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(StoreUserRequest $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        if (empty($request->password)) {
            $user->password = md5('123456');
        } else {
            $user->password = md5($request->password);
        }
         $user->save();

        return new UserResource($user);
    }

    public function index(){
        $users = User::all();
        return UserResource::collection($users);

    }

    public function show($id){
        $user = User::findorfail($id);
        return new UserResource($user);
        
    }

    public function destroy($id){
        $user = User::findorfail($id);
        $user->delete();
        return new UserResource($user);
        
    }

    public function update(UpdateUserRequest $request, $id){
        $user = User::findorfail($id);
        if ($request->has('name')) {
            $user->name = $request->name;
        }

        if ($request->has('email')) {
            $user->email = $request->email;
        }

        $user->save();

        return new UserResource($user);



    }
}
