<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pesan;
use App\Models\Pengguna;
use App\Models\peternak;
use Illuminate\Support\Facades\Auth;
use App\Events\SendMessage;

class ChatController extends Controller
{
    public function index(Request $request)
    {

        $user = Auth::user();
        $data["friends"] = Pengguna::whereNot("id", $user->id)->where("id_role", 2)->get();

        return view("chat", compact('data','user'));
    }

    public function saveMessage(Request $request)
    {
        $roomId = $request->roomId;
        $message = $request->message;
        $userId = Auth::user()->id;
        broadcast(new SendMessage($roomId,$userId, $message));

        pesan::create([
            'id_percakapan' => $roomId,
            'id_pengguna' => $userId,
            'pesan' => $message
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil dikirim'
        ]);
    }

    public function loadMessage($roomId)
    {
        $message = pesan::where('id_percakapan',$roomId)->orderBy('updated_at','asc')->get();
        return response()->json([
            'success' => true,
            'data' => $message,
        ]);
    }
}