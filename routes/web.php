<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CalculadoraController;

// Esta es una ruta de tipo GET (para pedir una página).
// Cuando entres a '/', se ejecutará esta función que devuelve (return)
// la vista llamada 'calculadora'.
Route::get('/', function () {
    return view('calculadora');
});

// Creamos una ruta de tipo POST especial para nuestra petición en segundo plano
Route::post('/api/calcular', [CalculadoraController::class, 'calcular']);