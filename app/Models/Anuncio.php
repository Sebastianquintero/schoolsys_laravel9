<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anuncio extends Model
{
    protected $table = 'anuncios';
    use SoftDeletes;

    protected $primaryKey = 'id_anuncio';
    protected $fillable = [
        'fk_colegio','created_by','titulo','descripcion','fecha',
        'imagen_path','publicado','media_type','video_url','video_path'
    ];

    protected $casts = ['fecha' => 'date'];

    public function getImagenUrlAttribute()
    {
        return $this->imagen_path ? asset('storage/'.$this->imagen_path) : null;
    }

    public function isImage(): bool     { return $this->media_type === 'image'; }
    public function isVideoUrl(): bool  { return $this->media_type === 'video_url'; }
    public function isVideoFile(): bool { return $this->media_type === 'video_file'; }

    public function getVideoSrcAttribute()
    {
        if ($this->isVideoUrl())  return $this->video_url;
        if ($this->isVideoFile()) return asset('storage/'.$this->video_path);
        return null;
    }
}
