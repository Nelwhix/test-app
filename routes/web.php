<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Notifications\TestNotification;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    $user = User::inRandomOrder()->first();
    $user->notify(new TestNotification());

    return view('welcome');
});
