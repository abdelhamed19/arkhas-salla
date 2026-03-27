<?php

use Illuminate\Support\Facades\Route;

Route::get('/say-hello', function () {
    return response()->json([
        'message' => 'Hello V1'
    ]);
});
