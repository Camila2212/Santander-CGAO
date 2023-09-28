<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mujer</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/099486b956.js" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.js"></script>
</head>

<body>
    <h1 id="ha" class="text-center">Bienvenida Mujer</h1>

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

    <!-- Modal Registar Mujer-->
    <div class="modal fade" id="modalInsertar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Mujer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para ingresar los datos de la mujer -->
                    <form action="{{ route('mujer.create') }}" method="post">
                        @csrf

                        <!-- ID -->
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="idMujer" name="idMujer" required>
                        </div>

                        <!-- Tipo de Documento -->
                        <div class="form-group">
                            <label for="tipoDocMujer">Tipo de Documento</label>
                            <input type="text" class="form-control" id="tipoDocMujer" name="tipoDocMujer"
                                value="Cedula">
                        </div>

                        <!-- Documento -->
                        <div class="form-group">
                            <label for="numeroDocMujer">Documento</label>
                            <input type="text" class="form-control" id="numeroDocMujer" name="numeroDocMujer"
                                required>
                        </div>

                        <!-- Nombres -->
                        <div class="form-group">
                            <label for="nombreMujer">Nombre</label>
                            <input type="text" class="form-control" id="nombreMujer" name="nombreMujer" required>
                        </div>

                        <!-- Apellidos -->
                        <div class="form-group">
                            <label for="apellidoMujer">Apellido</label>
                            <input type="text" class="form-control" id="apellidoMujer" name="apellidoMujer" required>
                        </div>

                        <!-- Teléfono -->
                        <div class="form-group">
                            <label for="telefonoMujer">Teléfono</label>
                            <input type="text" class="form-control" id="telefonoMujer" name="telefonoMujer" required>
                        </div>

                        <!-- Correo Electrónico -->
                        <div class="form-group">
                            <label for="correoMujer">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correoMujer" name="correoMujer" required>
                        </div>

                        <!-- Ciudad -->
                        <div class="form-group">
                            <label for="ciudadMujer">Ciudad</label>
                            <input type="text" class="form-control" id="ciudadMujer" name="ciudadMujer" required>
                        </div>

                        <!-- Dirección -->
                        <div class="form-group">
                            <label for="direccionMujer">Dirección</label>
                            <input type="text" class="form-control" id="direccionMujer" name="direccionMujer"
                                required>
                        </div>

                        <!-- Ocupación -->
                        <div class="form-group">
                            <label for="ocupacionMujer">Ocupación</label>
                            <input type="text" class="form-control" id="ocupacionMujer" name="ocupacionMujer"
                                required>
                        </div>

                        <!-- Botón de Enviar -->
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="p-5 table-responsive">
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalInsertar">Registrar
            Mujer</button>


        <table class="table table-hover table-striped table-bordered">
            <thead class="bg-info">
                <tr>
                    <th scope="col">id Mujer</th>
                    <th scope="col">Tipo Documento</th>
                    <th scope="col">N° Documento</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Ocupación</th>


                    <th scope="col"></th>
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
                            <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalModificar3{{ $item->idMujer }}">
                                <i class="fa-solid fa-user-pen"></i></a>

                            <a href="{{ route('mujer.delete', $item->idMujer) }}" onclick="return res()"
                                class="btn btn-danger btn-sm"><i class="fa-solid fa-user-minus"></i></a>
                        </td>






                        <!-- Modal Modificar -->
                        <div class="modal fade" id="modalModificar3{{ $item->idMujer }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Mujer</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('mujer.update') }}" method="post">
                                            @csrf

                                            <!-- ID -->
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="idMujer"
                                                    name="idMujer" value={{ $item->idMujer }} required>
                                            </div>

                                            <!-- Tipo de Documento -->
                                            <div class="form-group">
                                                <label for="tipoDocMujer">Tipo de Documento</label>
                                                <input type="text" class="form-control" id="tipoDocMujer"
                                                    name="tipoDocMujer" value={{ $item->tipoDocMujer }}>
                                            </div>

                                            <!-- Documento -->
                                            <div class="form-group">
                                                <label for="numeroDocMujer">Documento</label>
                                                <input type="text" class="form-control" id="numeroDocMujer"
                                                    name="numeroDocMujer" value={{ $item->numeroDocMujer }}>
                                            </div>

                                            <!-- Nombres -->
                                            <div class="form-group">
                                                <label for="nombreMujer">Nombre</label>
                                                <input type="text" class="form-control" id="nombreMujer"
                                                    name="nombreMujer" value={{ $item->nombreMujer }} required>
                                            </div>

                                            <!-- Apellidos -->
                                            <div class="form-group">
                                                <label for="apellidoMujer">Apellido</label>
                                                <input type="text" class="form-control" id="apellidoMujer"
                                                    name="apellidoMujer" value={{ $item->apellidoMujer }} required>
                                            </div>

                                            <!-- Teléfono -->
                                            <div class="form-group">
                                                <label for="telefonoMujer">Teléfono</label>
                                                <input type="text" class="form-control" id="telefonoMujer"
                                                    name="telefonoMujer" value={{ $item->telefonoMujer }} required>
                                            </div>

                                            <!-- Correo Electrónico -->
                                            <div class="form-group">
                                                <label for="correoMujer">Correo Electrónico</label>
                                                <input type="email" class="form-control" id="correoMujer"
                                                    name="correoMujer" value={{ $item->correoMujer }} required>
                                            </div>

                                            <!-- Ciudad -->
                                            <div class="form-group">
                                                <label for="ciudadMujer">Ciudad</label>
                                                <input type="text" class="form-control" id="ciudadMujer"
                                                    name="ciudadMujer" value={{ $item->ciudadMujer }} required>
                                            </div>

                                            <!-- Dirección -->
                                            <div class="form-group">
                                                <label for="direccionMujer">Dirección</label>
                                                <input type="text" class="form-control" id="direccionMujer"
                                                    name="direccionMujer" value={{ $item->direccionMujer }} required>
                                            </div>

                                            <!-- Ocupación -->
                                            <div class="form-group">
                                                <label for="ocupacionMujer">Ocupación</label>
                                                <input type="text" class="form-control" id="ocupacionMujer"
                                                    name="ocupacionMujer" value={{ $item->ocupacionMujer }} required>
                                            </div>

                                            <!-- Botón de Enviar -->
                                            <button type="submit" class="btn btn-primary">modificar mujer</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>






                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    </div>

</body>

</html>
