<!DOCTYPE html>
<x-miCom />
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mujer</title>
    <link rel="stylesheet" href="css/tablas.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/css/bootstrap.css">
    <!-- Orden correcto de los enlaces a scripts -->

</head>

<body class="miBody">


    <h1 id="ha" class="text-center"><span>Bienvenida Mujer</span></h1>

    @if (session('correcto'))
        <div class="alert alert-info">{{ session('correcto') }}</div>
    @endif


    @if (session('incorrecto'))
        <div class="alert alert-danger">{{ session('incorrecto') }}</div>
    @endif

    <script>
        var res = function() {
            var not = confirm("¿Estas seguro de eliminar esta mujer");
            return not;
        }
    </script>

    <!-- Formulario para ingresar los datos de la mujer -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 miForm" style="background-color: #fdfdfd; border-radius: 2%;">
                <form class="needs-validation" style=" padding: 25px;" action="{{ route('mujer.create') }}"
                    method="post" novalidate>
                    @csrf

                    <h4 class="text-center haa  "><span>Registar Nueva Mujer</span></h4>
                    <hr>

                    <!-- ID -->
                    <div class="form-group miformulario">
                        <input type="hidden" class="form-control" id="idMujer" name="idMujer" required>
                    </div>

                    <!-- Tipo de Documento -->
                    <div class="form-group miformulario">
                        <label for="tipoDocMujer" class="miLt" style="margin-top: 15px;">Tipo de Documento</label>
                        <input type="text" class="form-control" id="tipoDocMujer" name="tipoDocMujer" value="Cedula"
                            re>
                    </div>

                    <!-- Documento -->
                    <div class="form-group miformulario">
                        <label for="numeroDocMujer" class="miLt">Documento</label>
                        <input type="text" class="form-control" id="numeroDocMujer" name="numeroDocMujer" required>
                    </div>

                    <!-- Nombres -->
                    <div class="form-group miformulario">
                        <label for="nombreMujer" class="miLt">Nombre</label>
                        <input type="text" class="form-control" id="nombreMujer" name="nombreMujer" required>
                    </div>

                    <!-- Apellidos -->
                    <div class="form-group miformulario">
                        <label for="apellidoMujer" class="miLt">Apellido</label>
                        <input type="text" class="form-control" id="apellidoMujer" name="apellidoMujer" required>
                    </div>

                    <!-- Teléfono -->
                    <div class="form-group miformulario">
                        <label for="telefonoMujer" class="miLt">Teléfono</label>
                        <input type="text" class="form-control" id="telefonoMujer" name="telefonoMujer" required>
                    </div>

                    <!-- Correo Electrónico -->
                    <div class="form-group miformulario">
                        <label for="correoMujer" class="miLt">Correo Electrónico</label>
                        <input type="email" class="form-control" id="correoMujer" name="correoMujer" required>
                    </div>

                    <!-- Ciudad -->
                    <div class="form-group miformulario">
                        <label for="ciudadMujer" class="miLt">Ciudad</label>
                        <input type="text" class="form-control" id="ciudadMujer" name="ciudadMujer" required>
                    </div>

                    <!-- Dirección -->
                    <div class="form-group miformulario">
                        <label for="direccionMujer" class="miLt">Dirección</label>
                        <input type="text" class="form-control" id="direccionMujer" name="direccionMujer" required>
                    </div>

                    <!-- Ocupación -->
                    <div class="form-group miformulario" style="margin-bottom: 5rem;">
                        <label for="ocupacionMujer" class="miLt">Ocupación</label>
                        <input type="text" class="form-control" id="ocupacionMujer" name="ocupacionMujer" required>
                    </div>

                    <!-- Botón de Enviar -->
                    <div class="miDiv6 miLt">
                        <button type="submit" class="btn ">Agregar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>







    @php
        $contador = 0;
    @endphp

    <!-- Modal Ver Registros Mujer-->
    <div class="modal fade" id="modalInsertar2212" tabindex="-1" data-bs-target="#modal1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: #fff3f9;;">
                <div class="modal-header" style="flex-direction: column; background: #ffb7db4e;">
                    <center>
                        <h1 class="modal-title fs- ha " id="exampleModalLabel">Registros Mujer</h1>
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
                                <th class="miLt" scope="col">id Mujer</th>
                                <th class="miLt" scope="col">Tipo Documento</th>
                                <th class="miLt" scope="col">N° Documento</th>
                                <th class="miLt" scope="col">Nombre</th>
                                <th class="miLt" scope="col">Apellido</th>
                                <th class="miLt" scope="col">Telefono</th>
                                <th class="miLt" scope="col">Correo</th>
                                <th class="miLt" scope="col">Ciudad</th>
                                <th class="miLt" scope="col">Dirección</th>
                                <th class="miLt" scope="col">Ocupación</th>


                                <th class="miLt" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($datos as $item)
                                <tr>
                                    <th scope="row">{{ $item->idMujer }}</th>
                                    <td>{{ $item->tipoDocMujer }}</td>
                                    <td>{{ $item->numeroDocMujer }}</td>
                                    <td>{{ $item->nombreMujer }}</td>
                                    <td>{{ $item->apellidoMujer }}</td>
                                    <td>{{ $item->telefonoMujer }}</td>
                                    <td>{{ $item->correoMujer }}</td>
                                    <td>{{ $item->ciudadMujer }}</td>
                                    <td>{{ $item->direccionMujer }}</td>
                                    <td>{{ $item->ocupacionMujer }}</td>

                                    <td>
                                        <a href="#" id="Miboton" class="btn btn-sm abrir-modal"
                                            style="background: #ffb7db; " data-bs-toggle="modal"
                                            data-bs-target="#modalSecundario"
                                            onclick="ejecutarEvento(('{{ json_encode($item) }}'))"
                                            data-bs-id="{{ $item->idMujer }}" data-bs-index="{{ $contador }}"
                                            data-bs-info="{{ json_encode($item) }}">
                                            <i class="fa-solid fa-user-pen"></i>
                                        </a>


                                        <a href="{{ route('mujer.delete', $item->idMujer) }}"
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
                    <h1 class="modal-title fs-5 miLt" id="exampleModalLabel">Modificar Mujer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Contenido del segundo modal -->
                    
                    <form action="{{ route('mujer.update') }}" method="post">
                        @csrf

                        <!-- ID -->
                        <div class="form-group miLt miformulario">
                            <input type="hidden" class="form-control" id="idMujer1" name="idMujer" required>
                        </div>

                        <!-- Tipo de Documento -->
                        <div class="form-group miLt miformulario">
                            <label for="tipoDocMujer">Tipo de Documento</label>
                            <input type="text" class="form-control" id="tipoDocMujer1" name="tipoDocMujer">
                        </div>

                        <!-- Documento -->
                        <div class="form-group miLt miformulario">
                            <label for="numeroDocMujer">Documento</label>
                            <input type="text" class="form-control" id="numeroDocMujer1" name="numeroDocMujer">
                        </div>

                        <!-- Nombres -->
                        <div class="form-group miLt miformulario">
                            <label for="nombreMujer">Nombre</label>
                            <input type="text" class="form-control" id="nombreMujer1" name="nombreMujer">
                        </div>

                        <!-- Apellidos -->
                        <div class="form-group miLt miformulario">
                            <label for="apellidoMujer">Apellido</label>
                            <input type="text" class="form-control" id="apellidoMujer1" name="apellidoMujer"
                                value="" required>
                        </div>

                        <!-- Teléfono -->
                        <div class="form-group miLt miformulario">
                            <label for="telefonoMujer">Teléfono</label>
                            <input type="text" class="form-control" id="telefonoMujer1" name="telefonoMujer">
                        </div>

                        <!-- Correo Electrónico -->
                        <div class="form-group miLt miformulario">
                            <label for="correoMujer">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correoMujer1" name="correoMujer"
                                required>
                        </div>

                        <!-- Ciudad -->
                        <div class="form-group miLt miformulario">
                            <label for="ciudadMujer">Ciudad</label>
                            <input type="text" class="form-control" id="ciudadMujer1" name="ciudadMujer"
                                required>
                        </div>

                        <!-- Dirección -->
                        <div class="form-group miLt miformulario">
                            <label for="direccionMujer">Dirección</label>
                            <input type="text" class="form-control" id="direccionMujer1" name="direccionMujer"
                                required>
                        </div>

                        <!-- Ocupación -->
                        <div class="form-group miLt miformulario">
                            <label for="ocupacionMujer">Ocupación</label>
                            <input type="text" class="form-control" id="ocupacionMujer1" name="ocupacionMujer"
                                required>
                        </div>
                        <div class="miDiv5">
                        <!-- Botón de Enviar -->
                        <button type="submit" class="btn miLt">Modificar Mujer</button></div>
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
            
            document.getElementById('idMujer1').value = info.idMujer;
            document.getElementById('tipoDocMujer1').value = info.tipoDocMujer;
            document.getElementById('numeroDocMujer1').value = info.numeroDocMujer;
            document.getElementById('nombreMujer1').value = info.nombreMujer
            document.getElementById('apellidoMujer1').value = info.apellidoMujer;
            document.getElementById('telefonoMujer1').value = info.telefonoMujer;
            document.getElementById('correoMujer1').value = info.correoMujer;
            document.getElementById('ciudadMujer1').value = info.ciudadMujer;
            document.getElementById('direccionMujer1').value = info.direccionMujer;
            document.getElementById('ocupacionMujer1').value = info.ocupacionMujer;

            var modalSecundario = new bootstrap.Modal(document.getElementById('modalSecundario'));
            modalSecundario.show();

        }

        //     document.addEventListener('DOMContentLoaded', function () {
        //     var botones = document.querySelectorAll('.abrir-modal');
        //     alert("se Precioana abrir modal")
        //     botones.forEach(function (boton) {
        //         boton.addEventListener('click', function () {
        //             var idMujer = boton.getAttribute('data-bs-id');
        //             var index = boton.getAttribute('data-bs-index');
        //             var info = JSON.parse(boton.getAttribute('data-bs-info'));

        //             // Llenar los campos del formulario con la información del registro
        //             document.getElementById('idMujer').value = info.idMujer;
        //             document.getElementById('tipoDocMujer').value = info.tipoDocMujer;
        //             document.getElementById('numeroDocMujer').value = info.numeroDocMujer;
        //             document.getElementById('nombreMujer').value = info.nombreMujer;
        //             document.getElementById('apellidoMujer').value = info.apellidoMujer;
        //             document.getElementById('telefonoMujer').value = info.telefonoMujer;
        //             document.getElementById('correoMujer').value = info.correoMujer;
        //             document.getElementById('ciudadMujer').value = info.ciudadMujer;
        //             document.getElementById('direccionMujer').value = info.direccionMujer;
        //             document.getElementById('ocupacionMujer').value = info.ocupacionMujer;

        //             var modalSecundario = new bootstrap.Modal(document.getElementById('modalSecundario' + index));
        //             modalSecundario.show();
        //         });
        //     });
        // });
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
</body>

</html>
