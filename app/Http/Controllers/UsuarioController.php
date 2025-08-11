<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class UsuarioController extends Controller
{
    // Usuario autenticado se cambia su propia foto
    public function updateOwnAvatar(Request $request)
    {
        return $this->handleAvatarUpload($request, auth()->user());
    }

    // Admin cambia la foto de otro usuario
    public function updateAvatar(Request $request, Usuario $usuario)
    {
        return $this->handleAvatarUpload($request, $usuario);
    }

    private function handleAvatarUpload(Request $request, Usuario $usuario)
    {
        $request->validate([
            'foto_perfil' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $old = $usuario->foto_path;

        // Carpeta organizada por colegio/rol/usuario
        $rolMap = [1=>'admins', 2=>'docentes', 3=>'estudiantes'];
        $rolDir = $rolMap[$usuario->fk_rol] ?? 'usuarios';
        $base   = "avatars/{$usuario->fk_colegio}/{$rolDir}/{$usuario->id_usuario}";

        // Guarda con nombre hash en disk public
        $path = $request->file('foto_perfil')->store($base, 'public');

        // Actualiza BD
        $usuario->update(['foto_path' => $path]);

        // Borra la anterior si existe y es distinta
        if ($old && $old !== $path) {
            Storage::disk('public')->delete($old);
        }

        return back()->with('success', 'Foto actualizada correctamente.');
    }
}
