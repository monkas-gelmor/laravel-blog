<?php

use Illuminate\Support\Facades\Route;

/**
 * Gestion des routes gérée avec VueJS
 */

Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');
