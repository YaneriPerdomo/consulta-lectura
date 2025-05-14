<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Auth;
use Illuminate\Http\Request;

class ProfileReader extends Controller
{
    public function index()
    {
        $user = auth()->user();
        function formatting_hour($hour, $start)
        {
            $horaUtc = substr($hour, $start);

            // Crear un objeto Carbon a partir de la cadena de hora (asume una fecha arbitraria)
            $fechaHoraUtc = Carbon::parse($horaUtc, 'UTC'); // Asumimos que la hora original está en UTC

            // Convertir a la zona horaria local de Venezuela
            $fechaHoraLocal = $fechaHoraUtc->setTimezone('America/Caracas');

            // Formatear la hora al formato deseado (h:i a)
            $horaFormateada = $fechaHoraLocal->format('h:i a');

            return $horaFormateada;
        }

        return view('user.profile', [
            'hour_created_at' => formatting_hour(Auth::user()->created_at, 10),
            'hour_updated_at' => formatting_hour(Auth::user()->updated_at, 10),
        ]);
    }
}
