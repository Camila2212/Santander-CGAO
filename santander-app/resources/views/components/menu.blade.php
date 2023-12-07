<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top " style="background: #fec1df; width: 100%">
    <div class="container-fluid" style="background: #fec1df; width: 90%;">
        <div class="miLetra title-area">
            <div class="titulo">
                <span class="primera-linea">Manzanas del</span>
                <span class="segunda-linea">Cuidado</span>
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
            <div class="text-end">
            </div>
            @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-3 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <button type="button" class="btn transparent-button me-2 mibtn2" onclick="window.location='{{ route('login') }}';">
                        <span class="text-sm text-gray-700 dark:text-gray-500 underline mibtn2" style="text-decoration: none; color: white;">Login</span>
                    </button>
                    @if (Route::has('register'))
                        <button type="button" class="btn transparent-button me-2 mibtn2" onclick="window.location='{{ route('register') }}';">
                            <span class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline mibtn2" style="text-decoration: none; color: white;">Register</span>
                        </button>
                    @endif
                @endauth
            </div>
        @endif
            </div>

        </div>
    </div>
</nav>
</body>
</html>


