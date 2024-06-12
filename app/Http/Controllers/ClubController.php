<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;

class ClubController extends Controller
{
    public function store(Request $request) {
        $club = new Club();
        $club->name = $request->name;
        $club->save();
        return response()->json($club);
    }

    public function index(){
        $clubs = Club::all();
        return response()->json($clubs);
    }

    public function show($id){
        $club = Club::findorfail($id);
        return response()->json($club);
    }

    public function destroy($id){

        $club = Club::findorfail($id);
        $club->delete();
        return response()->json($club);
    }

    public function update(Request $request, $id){
        $club = Club::findorfail($id);
        $club->name = $request->name;
        $club->save();
        return response()->json($club);
    }

}
