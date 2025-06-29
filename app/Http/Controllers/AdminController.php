<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class AdminController extends Controller
{
    public function verEstudiantes()
    {
        $estudiantes = Usuario::where('fk_rol', 3)
        ->with('estudiante')
        ->paginate(10);;
        return view('admin_crud.admin', compact('estudiantes'));
    }
}
