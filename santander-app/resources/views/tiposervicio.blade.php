<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tipo Servicios</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/099486b956.js" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.js"></script>
</head>

<body>
    <h1 id="ha" class="text-center">Bienvenido a Tipos Servicios</h1>

    @if (session('correcto'))
        <div class="alert alert-info">{{ session('correcto') }}</div>
    @endif


    @if (session('incorrecto'))
        <div class="alert alert-danger">{{ session('incorrecto') }}</div>
    @endif

    <script>
        var res = function() {
            var not = confirm("¿Estas seguro de eliminar este tipo servicio");
            return not;
        }
    </script>

    <!-- Modal Registar Tipo Servicio-->
    <div class="modal fade" id="modalInsertar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Tipo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tservicio.create') }}" method="POST">
                        @csrf
                        <div class="mb-0">
                            <input type="hidden" class="form-control" id="idTipoServicio" aria-describedby="emailHelp"
                                name="idTipoServicio">
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre </label>
                            <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp"
                                name="nombre">
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
            Tipo Servicio</button>


        <table class="table table-hover table-striped table-bordered">
            <thead class="bg-info">
                <tr>
                    <th scope="col">id Tipo Servicio</th>
                    <th scope="col">Nombre</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($datos as $item)
                    <tr>
                        <th scope="row">{{ $item->idTipoServicio }}</th>
                        <td>{{ $item->nombre }}</td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalModificar{{ $item->idTipoServicio }}"><i
                                    class="fa-solid fa-user-pen"></i></a>
                            <a href="{{ route('tservicio.delete', $item->idTipoServicio) }}" onclick="return res()"
                                class="btn btn-danger btn-sm"><i class="fa-solid fa-user-minus"></i></a>
                        </td>



                        <!-- Modal Modificar Tipo Servicio-->
                        <div class="modal fade" id="modalModificar{{ $item->idTipoServicio }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Tipo Servicio</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('tservicio.update') }}" method="POST">
                                            @csrf

                                            <div class="mb-0">
                                                <input type="hidden" class="form-control" id="idTipoServicio"
                                                    aria-describedby="emailHelp" name="idTipoServicio"
                                                    value="{{ $item->idTipoServicio }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Nombre Tipo Servicio</label>
                                                <input type="text" class="form-control" id="nombre"
                                                    aria-describedby="emailHelp" name="nombre"
                                                    value="{{ $item->nombre }}">
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
