<!DOCTYPE html>
<x-miCom />
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ciudad</title>
    <link rel="stylesheet" href="css/tablas.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/css/bootstrap.css">

</head>

<body class="miBody">
    <h1 id="ha" class="text-center miLt">Ciudades</h1>

    @if (session('correcto'))
        <div class="alert alert-info">{{ session('correcto') }}</div>
    @endif

    @if (session('incorrecto'))
        <div class="alert alert-danger">{{ session('incorrecto') }}</div>
    @endif

    <script>
        var res = function() {
            var not = confirm("¿Estas seguro de eliminar esta ciudad");
            return not;
        }
    </script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 miForm" style="background-color: #fdfdfd; border-radius: 2%;">
                <form class="needs-validation" style=" padding: 25px;" action="{{ route('ciudad.create') }}"
                    method="post" novalidate>
                    @csrf
                    <h4 class="text-center haa  "><span>Registar Nueva Ciudad</span></h4>
                    <hr>
                    <div class="mb-0">
                        <input type="hidden" class="form-control" id="idCiudad" aria-describedby="emailHelp"
                            name="idCiudad">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" style="margin-top: 15px;" class="miLt">Nombre </label>
                        <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp"
                            name="nombre">
                    </div>

                    <div class="miDiv6" style="margin-top: 20px; margin-bottom: -30px;"></button>
                        <button type="submit" class="btn miLt">Agregar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>






    @php
        $contador = 0;
    @endphp

    <!-- Modal Ver Registros Ciudad-->
    <div class="modal fade" id="modalInsertar2212" tabindex="-1" data-bs-target="#modal1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: #fff3f9;;">
                <div class="modal-header" style="flex-direction: column; background: #ffb7db4e;">
                    <center>
                        <h1 class="modal-title fs- ha " id="exampleModalLabel">Registros Ciudades</h1>
                    </center>
                    <button type="button" class="btn-close"
                        style="margin-top: -69px;
                    margin-bottom: 58px;" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <hr>
                <div class="modal-body">
                    <!-- Contenido del primer modal -->
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr style="background: #ffc4e2;">
                                <th class="miLt" scope="col">id Ciudad</th>
                                <th class="miLt" scope="col">Nombre</th>

                                <th class="miLt" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($datos as $item)
                                <tr>
                                    <th scope="row">{{ $item->idCiudad }}</th>
                                    <td>{{ $item->nombre }}</td>


                                    <td>
                                        <a href="#" id="Miboton" class="btn btn-sm abrir-modal"
                                            style="background: #ffb7db; " data-bs-toggle="modal"
                                            data-bs-target="#modalSecundario"
                                            onclick="ejecutarEvento(('{{ json_encode($item) }}'))"
                                            data-bs-id="{{ $item->idCiudad }}" data-bs-index="{{ $contador }}"
                                            data-bs-info="{{ json_encode($item) }}">
                                            <i class="fa-solid fa-user-pen"></i>
                                        </a>


                                        <a href="{{ route('ciudad.delete', $item->idCiudad) }}"
                                            style="background: #e20000dc; color: #fdfdfd" onclick="return res()"
                                            class="btn  btn-sm"><i class="fa-solid fa-user-minus"></i></a>
                                    </td>

                                </tr>
                                @php
                                    $contador++;
                                @endphp
                            @endforeach

                        </tbody>
                    </table>


                    <!-- Fin del contenido del primer modal -->
                </div>
            </div>
        </div>
    </div>






     
    <!-- Modal Secundario -->
    <div class="modal fade" id="modalSecundario" tabindex="-1" data-bs-target="#modal2"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 miLt" id="exampleModalLabel">Modificar Ciudad</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Contenido del segundo modal -->
                    <form action="{{ route('ciudad.update') }}" method="POST">
                        @csrf
                        <div class="mb-0 form-group miformulario">
                            <input type="hidden" class="form-control" id="idCiudad1" name="idCiudad1" required>
                        </div>
                        <div class="mb-3 form-group miformulario">
                            <label for="nombre1" class="form-label">Nombre Ciudad</label>
                            <input type="text" class="form-control" id="nombre1" name="nombre1" >
                        </div>

                        <div class="modal-footer miDiv5">
                            
                            <button type="submit" class="btn miLt">Modificar</button>
                        </div>
                    </form>

                    <!-- Fin del contenido del segundo modal -->
                </div>
            </div>
        </div>
    </div>









  
    <div class="p-5 table-responsive miDiv5">
        <button class="btn  btn-sm " data-bs-toggle="modal" data-bs-target="#modalInsertar2212">Ver
            Registros</button>
    </div>

    <script>
        function ejecutarEvento(data) {
            var info = JSON.parse(data);

            //Llenar los campos del formulario con la información del registro
          
            document.getElementById('idCiudad1').value = info.idCiudad;
            document.getElementById('nombre1').value = info.nombre;
           

            var modalSecundario = new bootstrap.Modal(document.getElementById('modalSecundario'));
            modalSecundario.show();

        }

        
    </script>
    <script src="https://kit.fontawesome.com/099486b956.js" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYmcJ+oqHiO2gx2gFOMGz9A" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/099486b956.js" crossorigin="anonymous"></script>
</body>

</html>
