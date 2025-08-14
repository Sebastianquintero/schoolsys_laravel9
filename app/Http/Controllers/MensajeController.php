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
        $userId = auth()->user()->id_usuario;
        $q = trim(request('q'));

        $mensajes = Mensaje::with(['remitenteUsuario:id_usuario,nombres,apellidos'])
            ->where('destinatario', $userId)
            ->when($q, function ($query) use ($q) {
                $query->where(function ($qq) use ($q) {
                    $qq->where('asunto', 'like', "%{$q}%")
                        ->orWhere('contenido', 'like', "%{$q}%")
                        ->orWhereHas('remitenteUsuario', function ($u) use ($q) {
                            $u->where('nombres', 'like', "%{$q}%")
                                ->orWhere('apellidos', 'like', "%{$q}%")
                                ->orWhereRaw("CONCAT(nombres,' ',apellidos) like ?", ["%{$q}%"]);
                        });
                });
            })
            ->orderByDesc('fecha_envio')
            ->paginate(15)
            ->appends(request()->query()); 

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
            ->paginate(15);

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
    public function enviados()
    {
        $userId = auth()->user()->id_usuario;
        $q = trim(request('q'));

        $mensajes = Mensaje::with(['destinatarioUsuario:id_usuario,nombres,apellidos'])
            ->where('remitente', auth()->id())
            ->when($q, function ($query) use ($q) {
                $query->where(function ($qq) use ($q) {
                    $qq->where('asunto', 'like', "%{$q}%")
                        ->orWhere('contenido', 'like', "%{$q}%")
                        ->orWhereHas('destinatarioUsuario', function ($u) use ($q) {
                            $u->where('nombres', 'like', "%{$q}%")
                                ->orWhere('apellidos', 'like', "%{$q}%")
                                ->orWhereRaw("CONCAT(nombres,' ',apellidos) like ?", ["%{$q}%"]);
                        });
                });
            })
            ->orderByDesc('fecha_envio')
            ->paginate(15);

        return view('mensajes.enviados', compact('mensajes'));
    }
    public function borradores()
    {
        $userId = auth()->user()->id_usuario;
        $q = trim(request('q'));

        $mensajes = Mensaje::with('destinatarioUsuario')
            ->where('remitente', auth()->id())
            ->whereNull('fecha_envio') // ejemplo: no enviado aún
            ->when($q, function ($query) use ($q) {
                $query->where(function ($qq) use ($q) {
                    $qq->where('asunto', 'like', "%{$q}%")
                        ->orWhere('contenido', 'like', "%{$q}%")
                        ->orWhereHas('destinatarioUsuario', function ($u) use ($q) {
                            $u->where('nombres', 'like', "%{$q}%")
                                ->orWhere('apellidos', 'like', "%{$q}%")
                                ->orWhereRaw("CONCAT(nombres,' ',apellidos) like ?", ["%{$q}%"]);
                        });
                });
            })
            ->orderByDesc('fecha_creacion')
            ->paginate(15);

        return view('mensajes.borradores', compact('mensajes'));
    }

    public function papelera()
    {
        $userId = auth()->user()->id_usuario;

        $mensajes = Mensaje::with(['remitenteUsuario', 'destinatarioUsuario'])
            ->onlyTrashed() // si usas SoftDeletes
            ->where(function ($q) use ($userId) {
                $q->where('remitente', $userId)
                    ->orWhere('destinatario', $userId);
            })
            ->orderByDesc('deleted_at')
            ->paginate(15);

        return view('mensajes.papelera', compact('mensajes'));
    }

    // Función para verificar si el usuario es propietario del mensaje
    // Se usa en destroy, restore y forceDelete para evitar que otros usuarios accedan a los mensajes de otro usuario.
    // Se usa en el query para evitar que un usuario acceda
    private function userOwnsMessageQuery($q, $userId)
    {
        $q->where('remitente', $userId)->orWhere('destinatario', $userId);
    }
    public function destroy($id)
    {
        $userId = auth()->user()->id_usuario;

        $mensaje = Mensaje::where('id_mensaje', $id)
            ->where(function ($q) use ($userId) {
                $this->userOwnsMessageQuery($q, $userId);
            })
            ->firstOrFail();

        $mensaje->delete(); // SoftDelete → va a papelera

        return back()->with('ok', 'Mensaje movido a papelera.');
    }

    public function restore($id)
    {
        $userId = auth()->user()->id_usuario;

        $mensaje = Mensaje::withTrashed()
            ->where('id_mensaje', $id)
            ->where(function ($q) use ($userId) {
                $this->userOwnsMessageQuery($q, $userId);
            })
            ->firstOrFail();

        $mensaje->restore();

        return back()->with('ok', 'Mensaje restaurado.');
    }

    public function forceDelete($id)
    {
        $userId = auth()->user()->id_usuario;

        $mensaje = Mensaje::withTrashed()
            ->where('id_mensaje', $id)
            ->where(function ($q) use ($userId) {
                $this->userOwnsMessageQuery($q, $userId);
            })
            ->firstOrFail();

        // borrar adjunto si existe (en disk public)
        if ($mensaje->archivo_adjunto) {
            Storage::disk('public')->delete($mensaje->archivo_adjunto);
        }

        $mensaje->forceDelete();

        return back()->with('ok', 'Mensaje eliminado definitivamente.');
    }


}
