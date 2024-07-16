<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClubRequest;
use App\Http\Requests\UpdateClubRequest;
use App\Http\Resources\ClubResource;
use Illuminate\Http\Request;
use App\Models\Club;

class ClubController extends Controller
{
    public function index(){
        $clubs = Club::all();
        return ClubResource::collection($clubs);
    }

    public function store(StoreClubRequest $request) {
        $club = new Club();
        $club->name = $request->name;
        $club->supervisor()->associate($request->supervisor_id);
        $club->save();
        return new ClubResource($club);
    }

   
    public function show($id){
        $club = Club::findorfail($id);
        return new ClubResource($club);
    }

    public function update(UpdateClubRequest $request, $id){
        $club = Club::findorfail($id);
        $club->name = $request->name;
        $club->supervisor()->associate($request->supervisor_id);
        $club->save();
        return new ClubResource($club);
    }

    public function destroy($id){

        $club = Club::findorfail($id);
        $club->delete();
        return new ClubResource($club);
    }

   

}
