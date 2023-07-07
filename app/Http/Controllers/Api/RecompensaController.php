<?php

namespace App\Http\Controllers\Api;


use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Events\Registered;

class RecompensaController extends Controller
{
    
    
    
    
    public function verificarRecompensa(Request $request){
        $email = $request->input('email');

        

        $user = User::where('email', $email)->first();

        if ($user){
            
            return response()->json(['id' => $user->id]);
        }
        
        else{
            return response()->json(['exists' => $user]);
        }
        
    
        // $exists = User::where('email', $email)->exists();
        // $tokenExists = false;
    
        // if ($exists) {
        //     $user = Auth::user();
    
        //     // Verificar si el token ya existe para el usuario
        //     if ($user->tokens()->where('name', 'token_recompensa')->exists()) {
        //         // Token existe, enviar mensaje de espera
        //         return response()->json(['exists' => $exists, 'message' => 'Debes esperar 24 horas para solicitar otra recompensa.']);
        //     } else {
        //         // Token no existe, crear uno nuevo y generar la cookie
        //         $token = $user->createToken('token_recompensa')->plainTextToken;
        //         $tokenExists = true;
        //     }
        // }
    
        
        
        
        // return response()->json(['tokenExists' => $tokenExists]);
        
        // if (Auth::attempt($credentials)) {
        //     $user = Auth::user();
        //     $token = $user->token();
        //     return response()->json(['token' => $token], Response::HTTP_OK);
        // } else {
        //     return response()->json(['message' => 'Las credenciales no son válidas'], Response::HTTP_UNAUTHORIZED);
        // }
            
    }


    public function verificarTiempo(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $oro = $user->recompensa; 


    if ($user) {
        $tiempoGuardado = $user->tiempo; // Obtener el timestamp guardado en la base de datos
        $tiempoActual = time(); // Obtener el timestamp actual

        $intervalo = 24 * 60 * 60; // Intervalo de 24 horas en segundos

        if ($tiempoActual - $tiempoGuardado >= $intervalo) {
            // Han pasado 24 horas, realizar la acción deseada
            // Por ejemplo, permitir reclamar una recompensa nuevamente

            // Actualizar el campo de tiempo con el nuevo timestamp
            $user->tiempo = $tiempoActual;
            $user->save();
            $tiempoVerificar = true;
            return response()->json(['tiempo' => $tiempoVerificar, 'oro' => $oro]);

        }
        else {
            // Aún no han pasado 24 horas, mostrar un mensaje de error
            $tiempoVerificar = false;
            return response()->json(['tiempo' => $tiempoVerificar, 'oro' => $oro]);

        }
        }
    }


    
    public function guardarRecompensa(Request $request, $id)
    {
        $recompensasList = array(100, 200, 300, 400);
        $recompensaAleatoria = $recompensasList[array_rand($recompensasList)];

        $user = User::where('id', $id)->firstOrFail();
        $recompensaBD = $user->recompensa;  
        $user->recompensa = $recompensaAleatoria + $recompensaBD;
        $user->save();

        return response()->json(['recompensaAleatoria' => $recompensaAleatoria]);;
    }

    

        

    
    
}
