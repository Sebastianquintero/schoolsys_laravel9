<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MensajeController extends Controller
{
    public function bandejaEntrada()
    {
        $mensajes = Mensaje::with('usuarioRemitente')
            ->where('destinatario', Auth::id())
            ->orderByDesc('fecha_envio')
            ->get();

        return view('mensajes.mail', compact('mensajes'));
    }
    public function redactar()
    {
        $usuarios = Usuario::where('id_usuario', '!=', Auth::id())->get();

        return view('mensajes.redactar', compact('usuarios'));
    }

    public function enviar(Request $request)
    {
        $request->validate([
            'destinatario' => 'required|exists:usuarios,id_usuario',
            'asunto' => 'required|string|max:150',
            'contenido' => 'required|string',
            'archivo_adjunto' => 'nullable|file|max:2048',
        ]);

        $archivoNombre = null;
        if ($request->hasFile('archivo_adjunto')) {
            $archivoNombre = $request->file('archivo_adjunto')->store('mensajes', 'public');
        }

        Mensaje::create([
            'remitente' => Auth::id(),
            'destinatario' => $request->destinatario,
            'asunto' => $request->asunto,
            'contenido' => $request->contenido,
            'leido' => false,
            'fecha_creacion' => now(),
            'fecha_envio' => now(),
            'archivo_adjunto' => $archivoNombre,
        ]);

        return redirect()->route('mensajes.bandeja')->with('success', 'Mensaje enviado.');
    }
    public function ver($id)
    {
        $mensaje = Mensaje::with(['remitenteUsuario', 'destinatarioUsuario'])
            ->where('id_mensaje', $id)
            ->where(function ($query) {
                $query->where('remitente', auth()->id())
                    ->orWhere('destinatario', auth()->id());
            })
            ->firstOrFail();

        // Marcar como leído si eres el destinatario
        if ($mensaje->destinatario == auth()->id() && !$mensaje->leido) {
            $mensaje->leido = true;
            $mensaje->save();
        }

        return view('mensajes.leer', compact('mensaje'));
    }
    public function index()
    {
        $mensajes = Mensaje::where('destinatario', Auth::id())
            ->orderByDesc('fecha_envio')
            ->get();

        return view('mensajes.inbox', compact('mensajes'));
    }

    public function create()
    {
        $usuarios = Usuario::where('id_usuario', '!=', Auth::id())->get();
        return view('mensajes.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'destinatario' => 'required|exists:usuarios,id_usuario',
            'asunto' => 'required|string|max:150',
            'contenido' => 'required|string',
            'archivo_adjunto' => 'nullable|file|max:2048',
        ]);

        $archivo = null;
        if ($request->hasFile('archivo_adjunto')) {
            $archivo = $request->file('archivo_adjunto')->store('mensajes');
        }

        Mensaje::create([
            'remitente' => Auth::id(),
            'destinatario' => $request->destinatario,
            'asunto' => $request->asunto,
            'contenido' => $request->contenido,
            'leido' => false,
            'fecha_creacion' => now(),
            'fecha_envio' => now(),
            'archivo_adjunto' => $archivo,
        ]);

        return redirect()->route('mensajes.index')->with('success', 'Mensaje enviado correctamente.');
    }

    public function show($id)
    {
        $mensaje = Mensaje::where('id_mensaje', $id)
            ->where(function ($q) {
                $q->where('destinatario', Auth::id())->orWhere('remitente', Auth::id());
            })->firstOrFail();

        // Marcar como leído
        if (!$mensaje->leido && $mensaje->destinatario == Auth::id()) {
            $mensaje->update(['leido' => true]);
        }

        return view('mensajes.show', compact('mensaje'));
    }
}
