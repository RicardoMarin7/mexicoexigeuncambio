<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|PT+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/styles.css">
    <title>México Exige un Cambio</title>
    <script type="module" src="/js/all.js"></script>
    
</head>
<body>
    <header class="site-header {{request()->is('/') ? 'inicio':''}}">
            <div class="contenedor">
                <div class="barra">
                    <a href="/">
                        <h1 class="no-margin titulo">MéxicoExige<span>UnCambio</span></h1>
                    </a>
                    <nav class="navbar navbar-expand-sm navbar-dark navegacion">
                        <button class="navbar-toggler d-lg-none bg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"                                aria-expanded="true" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon custom-toggler"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="collapsibleNavId">
                            <ul class="navUL">
                                <li class="nav-item">
                                        <a class="nav-link" href={{route('index')}}>Inicio<span class="sr-only">(current)</span></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href={{ route('libros')}}>Libros</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href={{ route('messages.create')}}>Contacto</a>
                                </li>
                                
                                <li class="nav-item">
                                        <a class="nav-link" href={{route('donaciones')}}>Donaciones<span class="sr-only">(current)</span></a>
                                </li>
                                
                                @if (Auth::check())
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}</a>
                                        <div class="dropdown-menu {{request()->is('/') ? 'bg-none':'bg-red'}}" aria-labelledby="dropdownId">
                                            @if (auth()->user()->hasRoles(['admin']))
                                                <a class="dropdown-item" href={{ route('messages.index') }}>Mensajes</a>                                                     
                                            @else
                                                <a class="dropdown-item" href="#">Mis Compras</a>
                                            @endif                             
                                            <a class="dropdown-item" href={{ route('logout')}}>Cerrar Sesión</a>
                                        </div>
                                    </li>    
                                @else
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acceder</a>
                                        <div class="dropdown-menu {{request()->is('/') ? 'bg-none':'bg-red'}}" aria-labelledby="dropdownId">
                                            <a class="dropdown-item" href={{ route('login')}}>Iniciar Sesión</a>        
                                            <a class="dropdown-item" href={{ route('register')}}>Registrarse</a>
                                        </div>
                                    </li>

                                @endif
                                
                            </ul>
                        </div>
                    </nav>
                </div><!--Barra-->



                {!!request()->is('/') ? '<div class="texto-header">
                                            <h2 class="no-margin">Una mirada veraz a nuestro paÍs</h2>
                                            <p>Cambiando el rumbo de México</p>
                                           </div>' : ''!!}

    
            </div><!--Contenedor-->
    </header>

@yield('contenido')


<footer class="site-footer">
        <div class="contenedor contenedor-footer">
            <ul class="nav justify-content-center navegacion">
                <li class="nav-item">
                    <a class="nav-link" href={{ route('messages.create')}}>Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{route('donaciones')}}>Donaciones</a>
                </li>
            </ul>
            <p>Todos los derechos reservados. &COPY;</p>
        </div>
    </footer>
</body>
</html>