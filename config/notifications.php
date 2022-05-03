<?php

return [
    // The Echo namespaced path to the User model
    'user_model'  => 'App.Models.User',
    // Either a controller with an __invoke() method or controller@method
    'controllers' => [
        'list_unread_notifications' => Youpi\YoupiNotifications\Http\Controllers\GetAllUnreadController::class,
        'mark_as_read'              => Youpi\YoupiNotifications\Http\Controllers\MarkAsReadController::class,
        'mark_all_as_read'          => Youpi\YoupiNotifications\Http\Controllers\MarkAllAsReadController::class,
    ],

    'play_sound' => true,
    'default_sound' => 'https://soundbible.com/mp3/glass_ping-Go445-1207030150.mp3',

    'toasted_enabled' => true,
];
