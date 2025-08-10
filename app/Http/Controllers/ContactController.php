<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $body = "Has recibido un nuevo mensaje desde el formulario de contacto:\n\n"
            . "Nombre: {$data['name']}\n"
            . "Email: {$data['email']}\n"
            . "Asunto: {$data['subject']}\n\n"
            . "Mensaje:\n{$data['message']}";

        Mail::raw($body, function ($m) use ($data) {
            $m->to('schoolsys2025@gmail.com')
                ->from(config('mail.from.address'), config('mail.from.name')) // Gmail requiere tu propio from
                ->replyTo($data['email'], $data['name'])                      // para responder al usuario
                ->subject('Nuevo mensaje de contacto: ' . $data['subject']);
        });

        return back()->with('success', 'Tu mensaje ha sido enviado correctamente.');
    }
}
