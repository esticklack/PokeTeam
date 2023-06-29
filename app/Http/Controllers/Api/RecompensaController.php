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
