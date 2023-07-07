<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function update(Request $request)
{
    $user = Auth::user();

    // Verificar si se ha enviado una imagen
    if ($request->hasFile('profile_image')) {
        $image = $request->file('profile_image');

        // Guardar la imagen en la carpeta "public/images"
        $path = $image->store('public/images');

        // Obtener el nombre de archivo de la imagen
        $filename = basename($path);

        // Actualizar el campo de imagen de perfil del usuario
        $user->profile_image = $filename;
        $user->save();

        // Redireccionar a la página de perfil con un mensaje de éxito
        return redirect()->route('profile')->with('success', 'Imagen de perfil actualizada exitosamente.');
    }

    // Redireccionar a la página de perfil con un mensaje de error si no se proporcionó ninguna imagen
    return redirect()->route('profile')->with('error', 'No se seleccionó ninguna imagen.');
}

public function updateContraseña(Request $request)
{
    $user = Auth::user();

    // Validar los campos de contraseña actual y nueva contraseña
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|string|min:8|confirmed',
    ]);

    // Verificar si la contraseña actual del usuario coincide
    if (Hash::check($request->current_password, $user->password)) {
        // Actualizar la contraseña con la nueva contraseña proporcionada
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Redireccionar a la página de perfil con un mensaje de éxito
        return redirect()->route('profile')->with('success', 'Contraseña actualizada exitosamente.');
    }

    // Redireccionar a la página de perfil con un mensaje de error si la contraseña actual no coincide
    return redirect()->route('profile')->with('error', 'La contraseña actual no es válida.');
}



}
