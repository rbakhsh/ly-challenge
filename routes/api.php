<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/allUsers', function () {
   return User::all();
});

Route::delete('/users/{user}', function (User $user) {
    $success = $user->delete();

    return [
        'success' => $success
    ];
});

// Query builder: Fetch all users events
// Tested with user/events Model relationship to fetch data but performance was slow.
Route::get('/usersEvents', function () {
    return DB::table('users')
                ->join('events', 'users.id', '=', 'events.user_id')
                ->select('users.userFirstname', 'users.userSurname', 'users.userEmail', 'events.eventDate', 'events.eventType', 'events.eventMessage')
                ->get();
});
