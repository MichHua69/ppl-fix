<?php
use App\Models\pengguna;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function (pengguna $user, $id) {
    return (int) $user->id === (int) $id;
});



Broadcast::channel('chat.{roomId}', function (pengguna $user, int $roomId) {
    if ($user->canJoinRoom($roomId)) {
        return ['id' => $user->id, 'nama_pengguna' => $user->nama_pengguna];
    }
});