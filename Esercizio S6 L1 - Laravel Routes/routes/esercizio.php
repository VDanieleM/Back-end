<?php

use Illuminate\Support\Facades\Route;

// Creo un gruppo di rotte separate da quelle in web
Route::get('/singola', function () {
    return view('singola');
});

Route::get('/modifica', function () {
    return view('modifica');
});

Route::get('/elimina', function () {
    return view('elimina');
});

Route::get('/elenco', function () {
    return view('elenco');
});

Route::get('/creazione', function () {
    return view('creazione');
});