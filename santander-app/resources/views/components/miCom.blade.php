<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/css/bootstrap.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.1.1.min.js"></script>



</head>
<style>
    .miL1 {
        font-style: italic;
        font-family: Times New Roman;
        font-size: 23px;
        color: black;

    }

    .miMenu {
        font-size: 23px;
        margin-right: 40px;
    }

    .primera-linea1,
    .segunda-linea1 {
        display: block;
        font-size: 22px;
        /* Ajusta el tamaño según tus preferencias */
        font-weight: bold;
        /* Opcional: ajusta el peso de la fuente */
        transform: rotate(-4deg);
        /* Aplica un giro de 3 grados a la derecha */
    }

    .segunda-linea1 {
        font-size: 28px;
        /* Ajusta el tamaño según tus preferencias */
        margin-top: -15px;
    }
</style>

<body>
    <nav class="navbar navbar-expand-md  fixed-top " style="background: #fec1df; width: 100%">
        <div class="container-fluid" style="background: #fec1df; width: 90%; margin-bottom: 15px;
        margin-top: 10px;">
            <div class="miLetra title-area">
                <div class="titulo">
                    <span class="primera-linea1">Manzanas del</span>
                    <span class="segunda-linea1">Cuidado</span>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">



                </ul>
                <div class="miBus">
                    <div>

                        <svg xmlns="http://www.w3.org/2000/svg" style="margin-top: 9px; margin-right: 9px;"
                            width="25" height="25" fill="currentColor" class="bi bi-search-heart"
                            viewBox="0 0 16 16">
                            <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z" />
                            <path
                                d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z" />
                        </svg>
                    </div>
                    <div>
                        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">

                            <input type="search" class="form-control form-control-dark text-bg-dark"
                                placeholder="Search..." aria-label="Search" value="Buscar">
                        </form>
                    </div>
                </div>

                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" style="background: #fec1df;"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Log Out</button>
                            </form>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
    </nav>
    <div class="nav-scroller mb-3 border-bottom"
        style="margin-top: 45px; display: flex; justify-content: center; background: #fec1e0a6;">
        <nav class="nav nav-underline justify-content-between miL1 navbar-expand-md  ">
            <a class="nav-item nav-link link-body-emphasis miMenu active" style="font-size: 23px; color: black;"
                href="{{ route('mujer.index') }}">Mujer</a>
            <a class="nav-item nav-link link-body-emphasis miMenu" style="font-size: 23px; color: black;"
                href="{{ route('ciudad.index') }}">Ciudad</a>
            <a class="nav-item nav-link link-body-emphasis miMenu" style="font-size: 23px; color: black;"
                href="{{ route('tservicio.index') }}">Tipos de servicio</a>
            <a class="nav-item nav-link link-body-emphasis miMenu" style="font-size: 23px; color: black;"
                href="{{ route('servicio.index') }}">Servicio</a>
            <a class="nav-item nav-link link-body-emphasis miMenu" style="font-size: 23px; color: black;"
                href="{{ route('establecimiento.index') }}">Establecimiento</a>
            <a class="nav-item nav-link link-body-emphasis miMenu" style="font-size: 23px; color: black;"
                href="{{ route('manzana.index') }}">Manzana</a>
            <a class="nav-item nav-link link-body-emphasis miMenu" style="font-size: 23px; color: black;"
                href="{{ route('propuesta.index') }}">Propuesta</a>
        </nav>
    </div>

</body>


</html>
