<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

// Route::get('/endpoint', function (Request $request) {
//     //
// });

Route::get(
    '/unread',
    config(
        'youpi-notifications.controllers.list_unread_notifications',
        \Youpi\YoupiNotifications\Http\Controllers\GetAllUnreadController::class
    )
);

Route::patch(
    '/{notification}',
    config(
        'youpi-notifications.controllers.mark_as_read',
        \Youpi\YoupiNotifications\Http\Controllers\MarkAsReadController::class
    )
);
Route::patch(
    '/',
    config(
        'youpi-notifications.controllers.mark_all_as_read',
        \Youpi\YoupiNotifications\Http\Controllers\MarkAllAsReadController::class
    )
);

