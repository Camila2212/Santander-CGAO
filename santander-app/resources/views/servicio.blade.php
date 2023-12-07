<x-miCom />
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Servicios</title>
    <link rel="stylesheet" href="css/tablas.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/css/bootstrap.css">
   
</head>

<body class="miBody">
    <h1 id="ha" class="text-center">Bienvenido a Servicios</h1>

    @if (session('correcto'))
        <div class="alert alert-info">{{ session('correcto') }}</div>
    @endif


    @if (session('incorrecto'))
        <div class="alert alert-danger">{{ session('incorrecto') }}</div>
    @endif

    <script>
        var res = function() {
            var not = confirm("¿Estas seguro de eliminar este servicio");
            return not;
        }
    </script>





    <!-- Formulario para ingresar el Servicio -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 miForm" style="background-color: #fdfdfd; border-radius: 2%;">
                <form class="needs-validation" style=" padding: 25px;" action="{{ route('servicio.create') }}"
                    method="post" novalidate>
                    @csrf

                    <h4 class="text-center haa  "><span>Registar Un Nuevo Servicio</span></h4>
                    <hr>

                    <!-- ID -->
                    <div class="form-group miformulario mb-0">
                        <input type="hidden" class="form-control" id="idServicio" name="idServicio" required>
                    </div>

                    <!-- Nombre Del Servicio -->
                    <div class="form-group miformulario mb-3">
                        <label for="nombreServicio" class="miLt" style="margin-top: 15px;">Nombre Servicio</label>
                        <input type="text" class="form-control" id="nombreServicio" name="nombreServicio" required>
                    </div>

                    <!-- Descripcion del Servicio -->
                    <div class="form-group miformulario mb-3">
                        <label for="descripcionServicio" class="miLt">Descripcion Servicio</label>
                        <input type="text" class="form-control" id="descripcionServicio" name="descripcionServicio"
                            required>
                    </div>



                    <!-- Id Servicio -->
                    <div class="form-group miformulario " style="margin-bottom: 5rem;">
                        <label for="idTipoServicio" class="miLt">Id Tipo Servicio</label>
                        <input type="text" class="form-control" id="idTipoServicio" name="idTipoServicio" required>
                    </div>


                    <!-- Botón de Enviar -->
                    <div class="miDiv6 miLt">
                        <button type="submit" class="btn ">Agregar Servicio</button>

                    </div>
                </form>
            </div>
        </div>
    </div>



    @php
        $contador = 0;
    @endphp

    <!-- Modal Ver Registros De Servicios-->
    <div class="modal fade" id="modalInsertar2212" tabindex="-1" data-bs-target="#modal1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: #fff3f9;;">
                <div class="modal-header" style="flex-direction: column; background: #ffb7db4e;">
                    <center>
                        <h1 class="modal-title fs- ha " id="exampleModalLabel">Registros De Servicios</h1>
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
                                <th class="miLt" scope="col">id Servicio</th>
                                <th class="miLt" scope="col">Nombre Del Servicio</th>
                                <th class="miLt" scope="col">Descripcion del Servicio</th>
                                <th class="miLt" scope="col">Id Tipo Servicio</th>

                                <th class="miLt" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($datos as $item)
                                <tr>
                                    <th scope="row">{{ $item->idServicio }}</th>
                                    <td>{{ $item->nombreServicio }}</td>
                                    <td>{{ $item->descripcionServicio }}</td>
                                    <td>{{ $item->idTipoServicio }}</td>

                                    <td>
                                        <a href="#" id="Miboton" class="btn btn-sm abrir-modal"
                                            style="background: #ffb7db; " data-bs-toggle="modal"
                                            data-bs-target="#modalSecundario"
                                            onclick="ejecutarEvento(('{{ json_encode($item) }}'))"
                                            data-bs-id="{{ $item->idServicio }}" data-bs-index="{{ $contador }}"
                                            data-bs-info="{{ json_encode($item) }}">
                                            <i class="fa-solid fa-user-pen"></i>
                                        </a>


                                        <a href="{{ route('establecimiento.delete', $item->idServicio) }}"
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
                    <h1 class="modal-title fs-5 miLt" id="exampleModalLabel">Modificar Establecimiento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Contenido del segundo modal -->

                    <form action="{{ route('servicio.update') }}" method="post">
                        @csrf

                        <!-- ID -->
                        <div class="form-group miformulario mb-0">
                            <input type="hidden" class="form-control" id="idServicio1" name="idServicio1" required>
                        </div>

                        <!-- Nombre Del Servicio -->
                        <div class="form-group miformulario mb-3">
                            <label for="nombreServicio1" class="miLt" style="margin-top: 15px;">Nombre
                                Servicio</label>
                            <input type="text" class="form-control" id="nombreServicio1" name="nombreServicio1"
                                required>
                        </div>

                        <!-- Descripcion del Servicio -->
                        <div class="form-group miformulario mb-3">
                            <label for="descripcionServicio1" class="miLt">Descripcion Servicio</label>
                            <input type="text" class="form-control" id="descripcionServicio1"
                                name="descripcionServicio1" required>
                        </div>



                        <!-- Id Servicio -->
                        <div class="form-group miformulario " style="margin-bottom: 5rem;">
                            <label for="idTipoServicio1" class="miLt">Id Tipo Servicio</label>
                            <input type="text" class="form-control" id="idTipoServicio1" name="idTipoServicio1"
                                required>
                        </div>


                        <div class="miDiv5">
                            <!-- Botón de Enviar -->
                            <button type="submit" class="btn miLt">Modificar Establecimiento</button>
                        </div>
                    </form>

                    <!-- Fin del contenido del segundo modal -->
                </div>
            </div>
        </div>
    </div>

    <div class="p-5 table-responsive miDiv5 ">
        <button class="btn  btn-sm " data-bs-toggle="modal" data-bs-target="#modalInsertar2212">Ver
            Registros</button>
    </div>




    <script>
        function ejecutarEvento(data) {
            var info = JSON.parse(data);

            //Llenar los campos del formulario con la información del registro

            document.getElementById('idServicio1').value = info.idServicio;
            document.getElementById('nombreServicio1').value = info.nombreServicio;
            document.getElementById('descripcionServicio1').value = info.descripcionServicio;
            document.getElementById('idTipoServicio1').value = info.idTipoServicio;
            


            var modalSecundario = new bootstrap.Modal(document.getElementById('modalSecundario'));
            modalSecundario.show();

        }
    </script>




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
    <script src="/js/bootstrap.js"></script>















    
</body>

</html>
