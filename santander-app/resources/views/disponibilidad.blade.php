<x-miCom/>
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
    <h1 id="ha" class="text-center">Bienvenido a las propuestas</h1>

    @if (session('correcto'))
        <div class="alert alert-info">{{ session('correcto') }}</div>
    @endif


    @if (session('incorrecto'))
        <div class="alert alert-danger">{{ session('incorrecto') }}</div>
    @endif

    <script>
        var res = function() {
            var not = confirm("¿Estas seguro de eliminar esta propuesta");
            return not;
        }
    </script>

    <!-- Modal Registar Propuesta-->
    <div class="modal fade" id="modalInsertar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Propuesta</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('propuesta.create') }}" method="POST">
                        @csrf
                        <div class="mb-0">
                            <input type="hidden" class="form-control" id="idDisponibilidad"
                                aria-describedby="emailHelp" name="idDisponibilidad">
                        </div>
                        <div class="mb-3">
                            <label for="fechaDisponibilidad" class="form-label">fecha disponible</label>
                            <input type="datetime-local" class="form-control" id="fechaDisponibilidad"
                                aria-describedby="emailHelp" name="fechaDisponibilidad">
                        </div>
                        <div class="mb-3">
                            <label for="idManzana" class="form-label">id Manzana</label>
                            <input type="text" class="form-control" id="idManzana" aria-describedby="emailHelp"
                                name="idManzana">
                        </div>
                        <div class="mb-3">
                            <label for="idMujer" class="form-label">id Mujer</label>
                            <input type="text" class="form-control" id="idMujer" aria-describedby="emailHelp"
                                name="idMujer">
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
            Propuesta</button>


        <table class="table table-hover table-striped table-bordered">
            <thead >
                <tr style="background: #ffc4e2;">
                    <th scope="col">id Propuesta</th>
                    <th scope="col">Fecha Propuesta</th>
                    <th scope="col">id Manzana</th>
                    <th scope="col">id Mujer Establecimiento</th>
                    <th scope="col">Id Servicio</th>


                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($datos as $item)
                    <tr>
                        <th scope="row">{{ $item->idDisponibilidad }}</th>
                        <td>{{ $item->fechaDisponibilidad }}</td>
                        <td>{{ $item->idManzana }}</td>
                        <td>{{ $item->idMujer }}</td>
                        <td>{{ $item->idServicio }}</td>


                        <td>
                            <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalModificar{{ $item->idDisponibilidad }}"><i
                                    class="fa-solid fa-user-pen"></i></a>
                            <a href="{{ route('propuesta.delete', $item->idDisponibilidad) }}" onclick="return res()"
                                class="btn btn-danger btn-sm"><i class="fa-solid fa-user-minus"></i></a>
                        </td>



                        <!-- Modal Modificar Disponibilidad-->
                        <div class="modal fade" id="modalModificar{{ $item->idDisponibilidad }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Propuesta</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('propuesta.update') }}" method="POST">
                                            @csrf

                                            <div class="mb-0">
                                                <input type="hidden" class="form-control" id="idDisponibilidad"
                                                    aria-describedby="emailHelp" name="idDisponibilidad"
                                                    value="{{ $item->idDisponibilidad }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="nombreEst" class="form-label">Fecha Propuesta</label>
                                                <input type="text" class="form-control" id="fechaDisponibilidad"
                                                    aria-describedby="emailHelp" name="fechaDisponibilidad"
                                                    value="{{ $item->fechaDisponibilidad }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="idManzana" class="form-label">Id Manzana</label>
                                                <input type="text" class="form-control" id="idManzana"
                                                    aria-describedby="emailHelp" name="idManzana"
                                                    value="{{ $item->idManzana }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="idMujer" class="form-label">Id Mujer</label>
                                                <input type="text" class="form-control" id="idMujer"
                                                    aria-describedby="emailHelp" name="idMujer"
                                                    value="{{ $item->idMujer }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="idServicio" class="form-label">Id Servicio</label>
                                                <input type="text" class="form-control" id="idServicio"
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
