<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Establecimientos</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/099486b956.js" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.js"></script>
</head>

<body>
    <h1 id="ha" class="text-center">Bienvenido a Establecimientos</h1>

    @if (session('correcto'))
        <div class="alert alert-info">{{ session('correcto') }}</div>
    @endif


    @if (session('incorrecto'))
        <div class="alert alert-danger">{{ session('incorrecto') }}</div>
    @endif

    <script>
        var res = function() {
            var not = confirm("¿Estas seguro de eliminar este establecimiento");
            return not;
        }
    </script>

    <!-- Modal Registar Establecimiento-->
    <div class="modal fade" id="modalInsertar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Establecimiento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('establecimiento.create') }}" method="POST">
                        @csrf
                        <div class="mb-0">
                            <input type="hidden" class="form-control" id="idEstablecimiento"
                                aria-describedby="emailHelp" name="idEstablecimiento">
                        </div>
                        <div class="mb-3">
                            <label for="nombreEst" class="form-label">Nombre Establecimiento</label>
                            <input type="text" class="form-control" id="nombreEst" aria-describedby="emailHelp"
                                name="nombreEst">
                        </div>
                        <div class="mb-3">
                            <label for="responsableEst" class="form-label">Responsable del Establecimiento</label>
                            <input type="text" class="form-control" id="responsableEst" aria-describedby="emailHelp"
                                name="responsableEst">
                        </div>
                        <div class="mb-3">
                            <label for="direccionEst" class="form-label">Dirección del Establecimiento</label>
                            <input type="text" class="form-control" id="direccionEst" aria-describedby="emailHelp"
                                name="direccionEst">
                        </div>
                        <div class="mb-3">
                            <label for="idServicio" class="form-label">Id Servicio</label>
                            <input type="text" class="form-control" id="idServicio" aria-describedby="emailHelp"
                                name="idServicio">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Insertar</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="p-5 table-responsive">
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalInsertar">Registrar
            Establecimiento</button>


        <table class="table table-hover table-striped table-bordered">
            <thead class="bg-info">
                <tr>
                    <th scope="col">id Establecimiento</th>
                    <th scope="col">Nombre Establecimiento</th>
                    <th scope="col">Responsable del Establecimiento </th>
                    <th scope="col">Direccion Establecimiento</th>
                    <th scope="col">Id Servicio</th>


                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($datos as $item)
                    <tr>
                        <th scope="row">{{ $item->idEstablecimiento }}</th>
                        <td>{{ $item->nombreEst }}</td>
                        <td>{{ $item->responsableEst }}</td>
                        <td>{{ $item->direccionEst }}</td>
                        <td>{{ $item->idServicio }}</td>


                        <td>
                            <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalModificar{{ $item->idEstablecimiento }}"><i
                                    class="fa-solid fa-user-pen"></i></a>
                            <a href="{{ route('establecimiento.delete', $item->idEstablecimiento) }}"
                                onclick="return res()" class="btn btn-danger btn-sm"><i
                                    class="fa-solid fa-user-minus"></i></a>
                        </td>



                        <!-- Modal Modificar Establecimiento-->
                        <div class="modal fade" id="modalModificar{{ $item->idEstablecimiento }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Establecimiento
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('establecimiento.update') }}" method="POST">
                                            @csrf

                                            <div class="mb-0">
                                                <input type="hidden" class="form-control" id="idEstablecimiento"
                                                    aria-describedby="emailHelp" name="idEstablecimiento"
                                                    value="{{ $item->idEstablecimiento }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="nombreEst" class="form-label">Nombre
                                                    Establecimiento</label>
                                                <input type="text" class="form-control" id="nombreEst"
                                                    aria-describedby="emailHelp" name="nombreEst"
                                                    value="{{ $item->nombreEst }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="responsableEst" class="form-label">Responsable del
                                                    Establecimiento</label>
                                                <input type="text" class="form-control" id="responsableEst"
                                                    aria-describedby="emailHelp" name="responsableEst"
                                                    value="{{ $item->responsableEst }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="direccionEst" class="form-label">Direccion del
                                                    Establecimiento</label>
                                                <input type="text" class="form-control" id="direccionEst"
                                                    aria-describedby="emailHelp" name="direccionEst"
                                                    value="{{ $item->direccionEst }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="idServicio" class="form-label">Id Servicio</label>
                                                <input type="text" class="form-control" id="idTipoServicio"
                                                    aria-describedby="emailHelp" name="idServicio"
                                                    value="{{ $item->idServicio }}">
                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Modificar</button>
                                            </div>
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




</body>

</html>
