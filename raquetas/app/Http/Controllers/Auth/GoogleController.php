<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    // Redirigir al usuario a Google para autenticar
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Manejar el callback de Google después de la autenticación
    public function handleGoogleCallback()
    {
        try {
            // Obtener los detalles del usuario desde Google
            $googleUser = Socialite::driver('google')->user(); // Remueve 'stateless()' si no lo necesitas
            
            // Buscar o crear el usuario
            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt(uniqid()) // Contraseña aleatoria
                ]
            );

            // Autenticar al usuario en Laravel
            Auth::login($user);

            // Redirigir al usuario a la página de inicio o cualquier otra página
            return redirect()->route('inicio');  // O cualquier ruta de tu aplicación
        } catch (\Exception $e) {
            // En caso de error, redirigir con mensaje de error
            return redirect()->route('inicio')->with('error', 'Error de autenticación con Google. Intenta de nuevo.');
        }
    }
}
