<?php

use Illuminate\Support\Facades\Route;

// Esta es una ruta de tipo GET (para pedir una página).
// Cuando entres a '/', se ejecutará esta función que devuelve (return)
// la vista llamada 'calculadora'.
Route::get('/', function () {
    return view('calculadora');
});