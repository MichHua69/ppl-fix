<?php

namespace App\Http\Controllers;

use App\Models\percakapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function create(Request $request)
    {
        $me = Auth::user()->id;
        $friend = $request->friend_id;

        $room = percakapan::where('users',$me.':'.$friend)->orWhere('users',$friend.':'.$me)->first();

        if ($room) {
            $dataRoom = $room;
        }
        else {
            $dataRoom = percakapan::create([
                'users' => $me.':'.$friend,
            ]);
        }

        return response()->json([
                'succes' => true,
                'data' => $dataRoom,
            ]);

    }
}
