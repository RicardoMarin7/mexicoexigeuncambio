@extends('layout')

@section('contenido')

    <main class="seccion contenedor">
        <h2 class="fw-300 centrar-texto">Libros</h2>

        <div class="contenedor-anuncios">
            <div class="anuncio">
                <img src="img/portada1.png" alt="Portada del libro 1">
                
                <div class="contenido-anuncio">
                    <h3>México en Cambio: Verdades en México y otras naciones</h3>
                    <p>Historia, análisis y crítica de las politicas nacionales, que por siglos se han ejercido en México, observación internacional, propuestas para volver a habilitar, reconstruir México. Es una invitación a la sociedad civil de México y el mundo para actuar proactivamente al cambio necesario de sociedad y de nacion, crear una nueva forma de ser y gobernar.</p>
                    <p class="precio">Precio inicial $500</p>
                    @if (Auth::check())
                        @if (auth()->user()->hasRoles(['admin']))
                            <a href="download/Tomo2" class="boton boton-rojo d-block">Descargar</a>
                        @else    
                            <a href="{{url('/payments/pay')}}?title=Mexico en cambio Verdades en Mexico y otras naciones&price=500" class="boton boton-rojo d-block">Comprar Libro</a>
                        @endif
                    @else
                        <a href="{{ route('login')}}" class="boton boton-rojo d-block">Comprar Libro</a>
                    @endif
                </div>

            </div>

            <div class="anuncio">
                <img src="img/portada2.png" alt="Portada del libro 2">

                <div class="contenido-anuncio">
                    <h3>Realidades Comprobadas: Una historia y dos relatos</h3>
                    <p>Este tomo consta de dos narrativas y una historia; la primera es nacional y las otras dos son vivencias internacionales. La idea es la realización de tres producciones cinematográficas para apoyar económicamente al proyecto y de esta manera cambiar los escenarios de México y el mundo.</p>
                    <p class="precio">Precio inicial $500</p>
                    @if (Auth::check())
                        @if (auth()->user()->hasRoles(['admin']))
                            <a href="download/Tomo2" class="boton boton-rojo d-block">Descargar</a>
                        @else    
                            <a href="{{url('/payments/pay')}}?title=Realidades Comprobadas Una historia y dos relatos&price=500" class="boton boton-rojo d-block">Comprar Libro</a>
                        @endif
                    @else
                        <a href="{{ route('login')}}" class="boton boton-rojo d-block">Comprar Libro</a>
                    @endif
                </div>
            </div>

            <div class="anuncio">
                <img src="img/portada3.png" alt="Portada del libro 3">

                <div class="contenido-anuncio">
                    <h3>21 Versos de la verdad mexicanas, un relato y una canción desesperada</h3>
                    <p>Contiene 22 versos que se musicalizaran para presentar conciertos, con los cuales se planean beneficios económicos que se distribuirán a diversos grupos vulnerables. Dependiendo el tema de la letra, se hará una venta en forma de subasta para fomentar las fuentes de empleo para los jovenes para que de esa manera se evite la venta de drogas.</p>
                    <p class="precio">Precio inicial $500</p>
                    @if (Auth::check())
                        @if (auth()->user()->hasRoles(['admin']))
                            <a href="download/Tomo3" class="boton boton-rojo d-block">Descargar</a>
                        @else
                        <a href="{{url('/payments/pay')}}?title=21 Versos de la verdad mexicanas, un relato y una canción desesperada&price=500" class="boton boton-rojo d-block">Comprar Libro</a>
                        @endif
                    @else
                        <a href="{{ route('login')}}" class="boton boton-rojo d-block">Comprar Libro</a>
                    @endif
                </div>
        </div> <!-- contenedor anuncios-->
    </main>
    
@endsection