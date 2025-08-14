<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\Anuncio;




class AnuncioController extends Controller
{
    // Lista/gestión en Admin
    public function index()
    {
        $colegioId = auth()->user()->fk_colegio;
        $anuncios = Anuncio::where('fk_colegio', $colegioId)
        ->orderByDesc('fecha')
        ->paginate(10)
        ->withQueryString();
        return view('admin_crud.admin', compact('anuncios'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'titulo' => 'required|string|max:150',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'imagen'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'video_url'   => 'nullable|url',
            'video_file'  => 'nullable|mimetypes:video/mp4,video/webm|max:51200',
        ]);

        $colegioId = auth()->user()->fk_colegio;
        $data = [
            'fk_colegio'  => $colegioId,
            'created_by'  => auth()->user()->id_usuario,
            'titulo'      => $r->titulo,
            'descripcion' => $r->descripcion,
            'fecha'       => $r->fecha,
            'publicado'   => true,
        ];

        // Prioridad: imagen > video_url > video_file
        if ($r->hasFile('imagen')) {
            $dir = "anuncios/{$colegioId}";
            $binary = Image::read($r->file('imagen'))->cover(500,300)->toWebp(85);
            $filename = uniqid('anuncio_').'.webp';
            Storage::disk('public')->put("{$dir}/{$filename}", $binary);
            $data['imagen_path'] = "{$dir}/{$filename}";
            $data['media_type']  = 'image';
        } elseif ($r->filled('video_url')) {
            $data['video_url']  = $this->normalizeVideoUrl($r->video_url);
            $data['media_type'] = 'video_url';
        } elseif ($r->hasFile('video_file')) {
            $dir = "anuncios/{$colegioId}";
            $filename = uniqid('anuncio_').'.mp4';
            $r->file('video_file')->storeAs($dir, $filename, 'public');
            $data['video_path'] = "{$dir}/{$filename}";
            $data['media_type'] = 'video_file';
        }

        Anuncio::create($data);

        return back()->with('ok', 'Anuncio publicado.');
    }

    public function update(Request $r, $id)
    {
        $anuncio = Anuncio::where('id_anuncio', $id)
            ->where('fk_colegio', auth()->user()->fk_colegio)
            ->firstOrFail();

        $r->validate([
            'titulo' => 'required|string|max:150',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'imagen'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'video_url'   => 'nullable|url',
            'video_file'  => 'nullable|mimetypes:video/mp4,video/webm|max:51200',
            'clear_media' => 'nullable|boolean',
        ]);

        $anuncio->fill([
            'titulo'      => $r->titulo,
            'descripcion' => $r->descripcion,
            'fecha'       => $r->fecha,
        ]);

        // limpiar media si el admin lo decide
        if ($r->boolean('clear_media')) {
            if ($anuncio->imagen_path) Storage::disk('public')->delete($anuncio->imagen_path);
            if ($anuncio->video_path)  Storage::disk('public')->delete($anuncio->video_path);
            $anuncio->imagen_path = null;
            $anuncio->video_path  = null;
            $anuncio->video_url   = null;
            $anuncio->media_type  = null;
        }

        // reemplazo de media
        if ($r->hasFile('imagen')) {
            if ($anuncio->imagen_path) Storage::disk('public')->delete($anuncio->imagen_path);
            $dir = "anuncios/".auth()->user()->fk_colegio;
            $binary = Image::read($r->file('imagen'))->cover(500,300)->toWebp(85);
            $filename = uniqid('anuncio_').'.webp';
            Storage::disk('public')->put("{$dir}/{$filename}", $binary);
            $anuncio->imagen_path = "{$dir}/{$filename}";
            $anuncio->video_path = $anuncio->video_url = null;
            $anuncio->media_type = 'image';
        } elseif ($r->filled('video_url')) {
            if ($anuncio->video_path) Storage::disk('public')->delete($anuncio->video_path);
            $anuncio->video_url   = $this->normalizeVideoUrl($r->video_url);
            $anuncio->imagen_path = $anuncio->video_path = null;
            $anuncio->media_type  = 'video_url';
        } elseif ($r->hasFile('video_file')) {
            if ($anuncio->video_path) Storage::disk('public')->delete($anuncio->video_path);
            $dir = "anuncios/".auth()->user()->fk_colegio;
            $filename = uniqid('anuncio_').'.mp4';
            $r->file('video_file')->storeAs($dir, $filename, 'public');
            $anuncio->video_path  = "{$dir}/{$filename}";
            $anuncio->imagen_path = $anuncio->video_url = null;
            $anuncio->media_type  = 'video_file';
        }

        $anuncio->save();

        return back()->with('ok','Anuncio actualizado.');
    }
    public function destroy($id)
    {
        $a = Anuncio::where('id_anuncio',$id)
            ->where('fk_colegio',auth()->user()->fk_colegio)
            ->firstOrFail();

        $a->delete(); // SoftDelete
        return back()->with('ok','Anuncio eliminado (papelera).');
    }

    // (Opcional) Despublicar, pero NO borrar historico
    public function toggle($id)
    {
        $a = Anuncio::where('id_anuncio',$id)
            ->where('fk_colegio',auth()->user()->fk_colegio)
            ->firstOrFail();

        $a->publicado = !$a->publicado;
        $a->save();

        return back()->with('ok', $a->publicado ? 'Anuncio publicado.' : 'Anuncio oculto.');
    }
    private function normalizeVideoUrl(string $url): string
    {
        // Simplón: convierte youtu.be a youtube watch embed
        if (preg_match('#youtu\.be/([A-Za-z0-9_\-]+)#', $url, $m)) {
            return 'https://www.youtube.com/embed/'.$m[1];
        }
        if (preg_match('#youtube\.com/watch\?v=([A-Za-z0-9_\-]+)#', $url, $m)) {
            return 'https://www.youtube.com/embed/'.$m[1];
        }
        return $url; // Vimeo ya suele venir listo para iframe
    }
}
