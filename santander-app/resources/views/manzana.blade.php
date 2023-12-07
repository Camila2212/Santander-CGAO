
<x-miCom/>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manzanas del Cuidado</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/099486b956.js" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.js"></script>
</head>

<body>
    <h1 id="ha" class="text-center">Bienvenido a Manzanas del Cuidado</h1>

    @if (session('correcto'))
        <div class="alert alert-info">{{ session('correcto') }}</div>
    @endif


    @if (session('incorrecto'))
        <div class="alert alert-danger">{{ session('incorrecto') }}</div>
    @endif

    <script>
        var res = function() {
            var not = confirm("¿Estas seguro de eliminar esta manzana del cuidado");
            return not;
        }
    </script>

    <!-- Modal Registar Manzana-->
    <div class="modal fade" id="modalInsertar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Manzana</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('manzana.create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="idManzana" aria-describedby="emailHelp"
                                name="idManzana">
                        </div>
                        <!-- Nombres -->
                        <div class="form-group">
                            <label for="nombreManzana" class="form-label">Nombre </label>
                            <input type="text" class="form-control" id="nombreManzana" aria-describedby="emailHelp"
                                name="nombreManzana">
                        </div>
                        <!-- id ciudades -->
                        <div class="form-group">
                            <label for="idCiudad" class="form-label">id Ciudad </label>
                            <input type="text" class="form-control" id="idCiudad" aria-describedby="emailHelp"
                                name="idCiudad">
                        </div>
                        <!-- localidad -->
                        <div class="form-group">
                            <label for="localidadManzana" class="form-label">Localidad Manzana </label>
                            <input type="text" class="form-control" id="localidadManzana"
                                aria-describedby="emailHelp" name="localidadManzana">
                        </div>
                        <!-- Direccion -->
                        <div class="form-group">
                            <label for="direccionManzana" class="form-label">Direccion Manzana </label>
                            <input type="text" class="form-control" id="direccionManzana"
                                aria-describedby="emailHelp" name="direccionManzana">
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
            una Manzana</button>


        <table class="table table-hover table-striped table-bordered">
            <thead >
                <tr style="background: #ffc4e2;">
                    <th scope="col">id Manzana</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">id Ciudad</th>
                    <th scope="col">Localidad</th>
                    <th scope="col">Direccion</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($datos as $item)
                    <tr>
                        <th scope="row">{{ $item->idManzana }}</th>
                        <td>{{ $item->nombreManzana }}</td>
                        <td>{{ $item->idCiudad }}</td>
                        <td>{{ $item->localidadManzana }}</td>
                        <td>{{ $item->direccionManzana }}</td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalModificar{{ $item->idManzana }}"><i
                                    class="fa-solid fa-user-pen"></i></a>
                            <a href="{{ route('manzana.delete', $item->idManzana) }}" onclick="return res()"
                                class="btn btn-danger btn-sm"><i class="fa-solid fa-user-minus"></i></a>
                        </td>



                        <!-- Modal Modificar -->
                        <div class="modal fade" id="modalModificar{{ $item->idManzana }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Manzana </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('manzana.update') }}" method="POST">
                                            @csrf

                                            <div class="mb-0">
                                                <input type="hidden" class="form-control" id="idManzana"
                                                    aria-describedby="emailHelp" name="id"
                                                    value="{{ $item->idManzana }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="nombreManzana" class="form-label">Nombre Ciudad</label>
                                                <input type="text" class="form-control" id="nombreManzana"
                                                    aria-describedby="emailHelp" name="nombreManzana"
                                                    value="{{ $item->nombreManzana }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="idCiudad" class="form-label"> Id Ciudad</label>
                                                <input type="text" class="form-control" id="idCiudad"
                                                    aria-describedby="emailHelp" name="idCiudad"
                                                    value="{{ $item->idCiudad }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="localidadManzana" class="form-label">Localidad
                                                    Manzana</label>
                                                <input type="text" class="form-control" id="localidadManzana"
                                                    aria-describedby="emailHelp" name="localidadManzana"
                                                    value="{{ $item->localidadManzana }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="direccionManzana" class="form-label">Direccion
                                                    Manzana</label>
                                                <input type="text" class="form-control" id="direccionManzana"
                                                    aria-describedby="emailHelp" name="direccionManzana"
                                                    value="{{ $item->direccionManzana }}">
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
