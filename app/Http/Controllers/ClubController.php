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
}
