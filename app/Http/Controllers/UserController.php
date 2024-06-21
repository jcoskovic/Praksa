<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return UserResource::collection($users);

    }

    public function store(StoreUserRequest $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = empty($request->password) ? md5('123456') : md5($request->password); 
      
         $user->save();

        return new UserResource($user);
    }

  

    public function show($id){
        $user = User::findorfail($id);
        return new UserResource($user);
        
    }
    public function update(UpdateUserRequest $request, $id){
        $user = User::findorfail($id);
        $user->email = $request->email ?? $user->email;
        $user->name = $request->name ?? $user->name;
        $user->save();

       return new UserResource($user);
   }


    public function destroy($id){
        $user = User::findorfail($id);
        $user->delete();
        return new UserResource($user);
        
    }


}