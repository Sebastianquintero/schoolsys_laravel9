<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PasswordResetController extends Controller
{
    public function showRecoveryForm()
    {
        return view('login.recuperacion_password');
    }

    public function sendResetCode(Request $request)
    {
        $request->validate([
            'usuario' => 'required|email|exists:usuarios,correo',
        ]);

        $codigo = rand(1000, 9999);
        $email = $request->usuario;

        DB::table('password_resets')->updateOrInsert(
            ['email' => $email],
            ['token' => $codigo, 'created_at' => Carbon::now()]
        );

        Mail::raw("Tu código de recuperación es: $codigo", function ($message) use ($email) {
            $message->to($email)->subject('Recuperación de contraseña - SchoolSys');
        });

        return redirect()->route('password.code.form')->with('email', $email);
    }

    public function showCodeForm()
    {
        return view('login.codigo_verificacion');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:usuarios,correo',
            'codigo' => 'required|digits:4',
            'password' => 'required|confirmed|min:6'
        ]);

        $reset = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->codigo)
            ->first();

        if (!$reset) {
            return back()->withErrors(['codigo' => 'Código incorrecto o expirado.']);
        }

        Usuario::where('correo', $request->email)
            ->update(['contrasena' => bcrypt($request->password)]);

        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Contraseña restablecida.');
    }
}
