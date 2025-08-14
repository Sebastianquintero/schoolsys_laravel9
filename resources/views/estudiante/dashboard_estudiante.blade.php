<!DOCTYPE html>
<html lang="en">

<head>
    @include('estudiante.partials.head')
</head>

<body>
    <!-- Contenedor principal -->
    @include('estudiante.partials.contenedorPrincipalEst')

    <!-- Cuerpo -->
    @include('estudiante.partials.menu')

    <!-- Contenido principal -->
    <div class="sb2-2">
        <div class="sb2-2-2">
            <ul>
                <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
                <li class="active-bre"><a href="#"> Usuario (estudiante)</a></li>
            </ul>
        </div>
        @php
            $colegioId = auth()->user()->fk_colegio;
            $anuncios = \App\Models\Anuncio::where('fk_colegio', $colegioId)
                ->where('publicado', true)
                ->orderByDesc('fecha')
                ->paginate(6);
        @endphp
        {{-- Mensajes --}}
        @forelse($anuncios as $a)
            <div class="message-block">
                <div class="message-container text-center">
                    <h3 class="message-title">{{ mb_strtoupper($a->titulo) }}</h3>

                    @if($a->isImage() && $a->imagen_url)
                        <img src="{{ $a->imagen_url }}" class="d-block mx-auto"
                            style="width:500px;height:300px;object-fit:cover;border-radius:6px;">
                    @elseif($a->isVideoUrl() && $a->video_src)
                        <div style="max-width:560px;margin:0 auto;">
                            <div style="position:relative;padding-top:56.25%;"> {{-- 16:9 --}}
                                <iframe src="{{ $a->video_src }}" style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                    frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    @elseif($a->isVideoFile() && $a->video_src)
                        <video controls class="d-block mx-auto" style="width:500px;height:300px;border-radius:6px;">
                            <source src="{{ $a->video_src }}" type="video/mp4">
                            Tu navegador no soporta video.
                        </video>
                    @endif

                    <p class="text-muted mt-2">{{ $a->fecha->format('d M Y') }}</p>
                    <p class="message-text">{{ $a->descripcion }}</p>
                </div>
            </div>
        @empty
            <p class="text-muted">No hay anuncios por ahora.</p>
        @endforelse

        {{-- Paginación --}}
        @if(method_exists($anuncios, 'links'))
            <div class="mt-3">{{ $anuncios->links() }}</div>
        @endif

        <script src="{{ asset('lib/owlcarousel/slider.js') }}"></script>
    </div>
    </div>
    </div>

    @include('estudiante.partials.fotter')
</body>

</html>