<?php

namespace App\Http\Controllers;

// Importamos la herramienta de Laravel que nos permite leer los datos que envía el usuario
use Illuminate\Http\Request;

class CalculadoraController extends Controller
{
    // Creamos una función pública llamada 'calcular'
    public function calcular(Request $request)
    {
        // 1. Recibimos las variables que nos envió JavaScript
        $num1 = $request->input('numero1');
        $num2 = $request->input('numero2');
        $operacion = $request->input('operacion');

        $resultado = 0;

        // 2. Ejecutamos la lógica matemática del lado del servidor (PHP)
        switch ($operacion) {
            case '+':
                $resultado = $num1 + $num2;
                break;
            case '-':
                $resultado = $num1 - $num2;
                break;
            case '*':
                $resultado = $num1 * $num2;
                break;
            case '/':
                // Evitamos la división entre cero por seguridad
                if ($num2 == 0) {
                    return response()->json(['error' => 'No se puede dividir entre cero'], 400);
                }
                $resultado = $num1 / $num2;
                break;
            default:
                return response()->json(['error' => 'Operación no válida'], 400);
        }

        // 3. Respondemos a JavaScript con un formato JSON (el estándar de las APIs modernas)
        return response()->json([
            'resultado' => $resultado
        ]);
    }
}