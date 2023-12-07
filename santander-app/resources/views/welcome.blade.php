<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/app.css">
<link rel="stylesheet" href="css/css/bootstrap.css">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="js/bootstrap.js"></script>
    <title>Manzanas del Cuidado</title>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>

<body class="antialiased display text-center">

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="bootstrap" viewBox="0 0 118 94">
            <title>Bootstrap</title>
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z">
            </path>
        </symbol>
        <symbol id="bootstrap" viewBox="0 0 118 94">
            <title>Bootstrap</title>
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z">
            </path>
        </symbol>
        <symbol id="home" viewBox="0 0 16 16">
            <path
                d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
        </symbol>
        <symbol id="speedometer2" viewBox="0 0 16 16">
            <path
                d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
            <path fill-rule="evenodd"
                d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
        </symbol>
        <symbol id="table" viewBox="0 0 16 16">
            <path
                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
        </symbol>
        <symbol id="people-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd"
                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
        </symbol>
        <symbol id="grid" viewBox="0 0 16 16">
            <path
                d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
        </symbol>
    </svg>
    <x-menu />

    <main>

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">

                    <img src="img/Captura de pantalla 2023-11-15 102251.png" class="img-fluid" height="100%"
                        width="100%" alt="">
                    <div class="container-fluid">
                        <div class="carousel-caption text-start">
                            <h2>Conoce toda la actualidad de las manzanas del cuidado</h2>
                            <p>Encuentra las ultimas noticias</p>
                            <p><a class="btn btn-lg miBtn" href="{{ url('actualidad') }}">Más
                                    información</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/Captura de pantalla 2023-11-15 113205.png" height="100%" width="100%"
                        alt="">
                    <div class="container-fluid">
                        <div class="carousel-caption">
                            <h2>Buses del cuidado</h2>
                            <p>Son la versión móvil de las Manzanas del Cuidado.</p>
                            <p><a class="btn btn-lg miBtn" href="{{ url('busDelCuidado') }}">Ver
                                    información</a></p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="img/Captura de pantalla 2023-11-16 0850432.png" height="100%" width="100%"
                        alt="">
                    <div class="container-fluid">
                        <div class="carousel-caption">
                            <h2 class="bordeLetra1"><span class="resaltarLetra1">Servicios gratuitos</span></h2>
                            <p><span class="bordeLetra1 resaltarLetra1">Conoce los servicios gratuitos de las Manzanas
                                    del Cuidado</span></p>
                            <p><a class="btn btn-lg miBtn" href="#">Ver
                                    información</a></p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="img/rsl.png" height="100%" width="100%" alt="">

                    <div class="container-fluid">
                        <div class="carousel-caption text-end">
                            <h2 class="bordeLetra"><span>Manzanas del
                                    cuidado</span></h2>
                            <p><span class="bordeLetra ">Localiza la Manzana del Cuidado más
                                    cercana a tu ubicación</span>​</p>
                            <p><a class="btn btn-lg miBtn" href="#">Encuentra tu manzana</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <h1 class="miH1"><span>Conoce las Manzanas del Cuidado</span></h1>



        <div class="container-fluid marketing">
            <div class="row">
                <div class="col-lg-4">
                    <img src="img/qs.jpg" class="bd-placeholder-img rounded-circle imgCircular" width="140"
                        height="140" alt="">
                    <h2 class="fw-normal miL">Las Manzanas del Cuidado</h2>
                    <p class="miP">Ofrecemos atención dedicada en áreas urbanas para mujeres y sus familias.</p>
                    <p><br><a class="btn " href="#">Ver más &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img src="img/dE.jpg" class="bd-placeholder-img rounded-circle imgCircular" width="140"
                        height="140" alt="">

                    <h2 class="fw-normal miL">Encuentra la más cercana.​</h2>
                    <p class="miP">Descubre la ubicación más próxima a ti y explora un mundo lleno de aventuras</p>
                    <p><br><a class="btn btn1" href="#">Ver más &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img src="img/sgpt1.png" class="bd-placeholder-img rounded-circle imgCircular" width="140"
                        height="140" alt="">
                    <h2 class="fw-normal miL">Servicios gratuitos para ti</h2>
                    <p class="miP">Ven con tu familia y disfruta fácilmente de nuestros servicios gratuitos.</p>
                    <p><a class="btn" href="#">Ver más &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
            </div>
        </div>



        <h1 class="miH2 resaltarLetra "><span>Conoce otros servicios del Sistema Distrital de Cuidado</span></h1>
        <br>
        <div class="miDivImg">
            <div class="contenedorImagen">
                <img src="img/bus2.png" class="rounded miImg" alt="...">
            </div>

            <div class="contenedorImagen">
                <img src="img/casa2.png" class="rounded miImg" alt="...">
            </div>

            <div class="contenedorImagen">
                <img src="img/cuidadora2.png" class="rounded miImg" alt="...">
            </div>
        </div>
        <img src="img/MC4.png" alt="" width="500px">
        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 miDiv3">
                <div>
                    <h3 class="featurette-heading fw-normal lh-1 miH2 resaltarLetra2 miST">
                        Comó Nace el Sistema Distrital de Cuidado.
                    </h3>
                </div>
                <br>
                <p class="lead miP2"><b>Bogotá es la primera ciudad de América Latina en tener un Sistema de
                        Cuidado.</b> La
                    apuesta por un modelo de corresponsabilidad que le quite la sobrecarga de trabajos de cuidado a las
                    mujeres ya es una realidad en la ciudad.</p>
                <p><a class="btn miBtn3 btn-lg" href="#">Leer más</a></p>
            </div>
            <div class="col-md-5">
                <img src="img/SDC.jpg" alt="" width="600px">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2 miDiv3">
                <h3 class="featurette-heading fw-normal lh-1 miH2 resaltarLetra2 miST">
                    Estrategia Cuidado a Cuidadoras
                </h3>
                <br>
                <p class="lead miP2"> objetivos del Sistema Distrital de Cuidado en el marco del Plan Distrital de
                    Desarrollo 2020-2024. Se propone una estrategia que revalore el trabajo de cuidado, empoderando a
                    cuidadores a través de servicios de reposo, recreación, formación y homologación. Se enfatiza la
                    inclusión de diversas comunidades, como adultas mayores, líderes comunitarias, cuidadoras de
                    animales, mujeres rurales, personas LBT, indígenas, campesinas, negras, afrocolombianas, raizales,
                    palenqueras y Rrom.</p>
                <p><a class="btn miBtn3 btn-lg" href="#">Leer más</a></p>
            </div>
            <div class="col-md-5">
                <img src="img/ISC.png" alt="" style="margin-left: 20px;" width="600px">
            </div>
        </div>




        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 miDiv3">
                <h3 class="featurette-heading fw-normal lh-1 miH2 resaltarLetra2 miST">A Cuidar se Aprende</h3>
                <br>
                <p class="lead miP2">¡Llegó la hora de aprender a cuidar! El cuidado no es un don natural, todas y
                    todos
                    debemos hacerlo. En Bogotá sabemos que el primer paso para lograr la igualdad es distribuir
                    equitativamente los trabajos de cuidado. Por eso en el Sistema de Cuidado creamos una Estrategia
                    para que todas y todos aprendamos a hacerlo.</p>
                <p><a class="btn miBtn3 btn-lg" href="#">Leer más</a></p>
            </div>
            <div class="col-md-5">
                <img src="img/Corazon.png" alt="" width="600px">
            </div>
        </div>

        <hr class="featurette-divider">

        <img src="img/CALQNC.jpg" alt="Cuidamos a las que nos cuidan" width="600px" style="margin-bottom: 60px">
        <br>
        <br>

        <p class="lead miP2">Encuentra en este mapa las Manzanas del Cuidado activas en Bogotá.
            <br>
            ¡Obtén su ubicación y conoce cómo llegar!
        </p>
        <br>
        <div id="miMapa">

            <div id="map">
                <script>
                    var map = L.map('map').setView([4.60971, -74.08175], 11); // Establece las coordenadas y el nivel de zoom iniciales

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);

                    // Agrega ubicaciones fijas

                    var marker1 = L.marker([4.762906, -74.046304]).addTo(map).bindPopup('Centro Comercial Santa fe');
                    var marker2 = L.marker([4.642966, -74.188761]).addTo(map).bindPopup('Manzana del Cuidado de Bosa-El Porvenir');
                    var marker3 = L.marker([4.500622, -74.108807]).addTo(map).bindPopup('Manzana del Cuidado de Usme');
                    var marker4 = L.marker([4.550461, -74.150535]).addTo(map).bindPopup('Manzana del Cuidado de Ciudad Bolivar');
                    var marker5 = L.marker([4.617617, -74.123995]).addTo(map).bindPopup('Manzana del Cuidado de Puente Aranda');
                    var marker6 = L.marker([4.681811, -74.141778]).addTo(map).bindPopup('Manzana del Cuidado de Fontibon');
                    var marker7 = L.marker([4.741158, -74.023722]).addTo(map).bindPopup('Manzana del Cuidado de FUsaquén');


                    
                </script>
            </div>






            {{-- 
            <script>
                var map = L.map('map').setView([51.505, -0.09], 13);
        
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
        
                // Agrega ubicaciones fijas con popups
                var marker1 = L.marker([51.5, -0.09]).addTo(map);
                marker1.bindPopup("<b>Ubicación 1</b><br>Información adicional sobre el lugar.");
        
                var marker2 = L.marker([51.51, -0.1]).addTo(map);
                marker2.bindPopup("<b>Paris</b><br><b>Servicios:</b>Cuidado a niños<br><b>Nombre</b>Manzanitas del cuidado<br>").openPopup();
            </script> --}}






        </div>
        <br>
        <br>
        <p class="lead miP2">En las Manzanas del Cuidado encuentra los servicios de:
        </p>

        <img src="img/Captura de pantalla 2023-11-21 153722.png" width="700px" alt=""
            style="margin-bottom: 80px;">

            
        <!-- /END THE FEATURETTES -->

        <div style="background: #fec1e08f; padding-top: 1rem !important;"><br></div>
        <div style="background: #fec1e08f;">
            <footer class="miCont" hunjstyle="padding-top: 2rem !important;">



                <div class="row" style="display: flex;">
                    <div class="col-6">
                        <h5 class="col-md-2">Menú</h5>
                        <ul style="width: 385px; height: 180px; display: flex; flex-direction: column;">
                            <li class="nav-item mb-2" style="display: block;"><a href="#"
                                    class="nav-link p-0 text-muted">¿Qué son los trabajos de cuidado?</a></li>
                            <li class="nav-item mb-2" style="display: block;"><a href="#"
                                    class="nav-link p-0 text-muted">Encuentra la manzana del cuidado más cercana</a>
                            </li>
                            <li class="nav-item mb-2" style="display: block;"><a href="#"
                                    class="nav-link p-0 text-muted">Buses del Cuidado</a></li>
                            <li class="nav-item mb-2" style="display: block;"><a href="#"
                                    class="nav-link p-0 text-muted">Programa de Asistencia en Casa</a></li>
                            <li class="nav-item mb-2" style="display: block;"><a href="#"
                                    class="nav-link p-0 text-muted">#ACuidarSeAprende</a></li>
                            <li class="nav-item mb-2" style="display: block;"><a href="#"
                                    class="nav-link p-0 text-muted">Estrategia de Cuidado a Cuidadoras</a></li>
                        </ul>
                    </div>






                    <div class="col-md-5 offset-md-1 mb-3">
                        <form>
                            <h5>¡Queremos escucharte!</h5>
                            <p>
                                En Las Manzanas Del Cuidado, valoramos tu opinión y
                                estamos abiertos a recibir sugerencias que nos ayuden a mejorar.</p>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                <label for="newsletter1" class="visually-hidden">Email address</label>
                                <input id="newsletter1" type="text" class="form-control"
                                    placeholder="Sugerencias">
                                <button class="btn btn-primary" type="button">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="d-flex flex-column flex-sm-row justify-content-between border-top miFooter">
                    <p>&copy; 2023 - Alcaldía Mayor de Bogotá - Todos los derechos reservados.</p>
                    <p class="float-end"><a href="#">Volver al inicio</a></p>
                    <ul class="list-unstyled d-flex">
                        <li class="ms-3"><a class="link-dark" href="https://www.tiktok.com/@secredistmujer"><svg
                                    class="bi" width="24" height="24">
                                    <use xlink:href="#twitter" />
                                </svg></a></li>
                        <li class="ms-3"><a class="link-dark"
                                href="https://instagram.com/sdmujerbogota?igshid=YzAwZjE1ZTI0Zg=="><svg class="bi"
                                    width="24" height="24">
                                    <use xlink:href="#instagram" />
                                </svg></a></li>
                        <li class="ms-3"><a class="link-dark" href="https://www.facebook.com/secredistmujer/"><svg
                                    class="bi" width="24" height="24">
                                    <use xlink:href="#facebook" />
                                </svg></a></li>
                        <li class="ms-3"><a class="link-dark" href="https://www.tiktok.com/@secredistmujer"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z" />
                                </svg></a></li>
                    </ul>
                </div>

            </footer>
        </div>


    </main>


</body>

</html>
