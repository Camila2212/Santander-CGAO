<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Servicios</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/099486b956.js" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.js"></script>
</head>

<body>
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

    <!-- Modal Registar Servicio-->
    <div class="modal fade" id="modalInsertar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Servicio</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('servicio.create') }}" method="POST">
                        @csrf
                        <div class="mb-0">
                            <input type="hidden" class="form-control" id="idServicio" aria-describedby="emailHelp"
                                name="idServicio">
                        </div>
                        <div class="mb-3">
                            <label for="nombreServicio" class="form-label">Nombre Servicio</label>
                            <input type="text" class="form-control" id="nombreServicio" aria-describedby="emailHelp"
                                name="nombreServicio">
                        </div>
                        <div class="mb-3">
                            <label for="descripcionServicio" class="form-label">Descripcion Servicio</label>
                            <input type="text" class="form-control" id="descripcionServicio"
                                aria-describedby="emailHelp" name="descripcionServicio">
                        </div>
                        <div class="mb-3">
                            <label for="idTipoServicio" class="form-label">Id Tipo Servicio</label>
                            <input type="text" class="form-control" id="idTipoServicio" aria-describedby="emailHelp"
                                name="idTipoServicio">
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
            Servicio</button>


        <table class="table table-hover table-striped table-bordered">
            <thead class="bg-info">
                <tr>
                    <th scope="col">id Servicio</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion </th>
                    <th scope="col">Id Tipo Servicio</th>

                    <th scope="col"></th>
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
                            <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalModificar{{ $item->idServicio }}"><i
                                    class="fa-solid fa-user-pen"></i></a>
                            <a href="{{ route('servicio.delete', $item->idServicio) }}" onclick="return res()"
                                class="btn btn-danger btn-sm"><i class="fa-solid fa-user-minus"></i></a>
                        </td>



                        <!-- Modal Modificar Servicio-->
                        <div class="modal fade" id="modalModificar{{ $item->idServicio }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Servicio</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('servicio.update') }}" method="POST">
                                            @csrf

                                            <div class="mb-0">
                                                <input type="hidden" class="form-control" id="idServicio"
                                                    aria-describedby="emailHelp" name="idServicio"
                                                    value="{{ $item->idServicio }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Nombre Servicio</label>
                                                <input type="text" class="form-control" id="nombre"
                                                    aria-describedby="emailHelp" name="nombre"
                                                    value="{{ $item->nombreServicio }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="descripcionServicio" class="form-label">Descripcion
                                                    Servicio</label>
                                                <input type="text" class="form-control" id="descripcionServicio"
                                                    aria-describedby="emailHelp" name="descripcionServicio"
                                                    value="{{ $item->descripcionServicio }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="idTipoServicio" class="form-label">Id Tipo
                                                    Servicio</label>
                                                <input type="text" class="form-control" id="idTipoServicio"
                                                    aria-describedby="emailHelp" name="idTipoServicio"
                                                    value="{{ $item->idTipoServicio }}">
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
