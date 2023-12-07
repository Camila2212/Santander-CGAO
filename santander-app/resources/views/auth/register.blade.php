<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to right, #ff8aaf, #fec1e0);
            font-family: 'Arial', sans-serif;
            overflow: hidden;
        }

        .register-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            position: relative;
            overflow: hidden;
            width: 320px;
            max-width: 100%;
        }

        .register-header {
            color: #fec1e0;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .register-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-size: 15px;
            margin-bottom: 5px;
            color: #333;
            flex: 1;
            margin-right: 50px;
        }

        .input {
            width: 250px;
            padding-left: 15px;
            padding-right: 15px;
            padding-bottom: 10px;
            padding-top: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
        }

        .input-group {
            display: flex;
            align-items: center;
        }

        .icon-container {
            display: flex;
            align-items: center;
            margin-right: 10px;
        }

        .icon-container svg {
            width: 20px;
            height: 20px;
            fill: #333;
        }

        .register-button {
            background-color: #fec1e0;
            color: #fff;
            padding: 15px;
            border: none;
            border-radius: 8px;
            font-size: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .register-button:hover {
            background-color: #ff8aaf;
        }

        .login-link {
            margin-top: 20px;
            color: #333;
            cursor: pointer;
            font-size: 16px;
            transition: color 0.3s ease;
            text-decoration: none;
        }

        .login-link:hover {
            color: #fec1e0;
        }

        .deco-circle {
            position: absolute;
            background-color: #ff8aaf;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            top: -80px;
            right: -80px;
            opacity: 0.4;
            animation: moveCircle 8s infinite linear;
        }

        @keyframes moveCircle {
            0% {
                transform: translate(0, 0);
            }

            25% {
                transform: translate(150px, 50px);
            }

            50% {
                transform: translate(0, 0);
            }

            75% {
                transform: translate(-150px, 50px);
            }

            100% {
                transform: translate(0, 0);
            }
        }

        .icon-container1 svg {
            width: 20px;
            height: 20px;
            fill: #333;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <div class="deco-circle"></div>
        <div class="register-header">REGISTRARSE</div>


        <form method="POST" action="{{ route('register') }}" class="register-form">
            @csrf

            <!-- Nombre -->
            <div>
                <x-input-label for="name" :value="__('')" />
                <div class="input-group">
                    <span class="icon-container">
                        <i class="fas fa-user"></i>
                    </span>
                    <x-text-input id="name" class="input block mt-1 w-full" type="text"
                        value="Escribe tu nombre" name="name" : onfocus="clearNameValue()" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
            </div>


            <!-- Email -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('')" />
                <div class="input-group">
                    <span class="icon-container">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <x-text-input id="email" class="input block mt-1 w-full" type="email" name="email"
                        value="tucorreo@gmail.com" : onfocus="clearEmailValue()" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>


            <!-- Contraseña -->

            <div class="mt-4" style="position: relative;">
                <x-input-label for="password" :value="__('')" />
                <div class="input-group" style="position: relative;">
                    <span class="icon-container">
                        <i class="fas fa-key"></i>
                    </span>
                    <x-text-input id="password" class="input block mt-1 w-full" value="Escribe tu contraseña"
                        type="text" name="password" required autocomplete="current-password" onfocus="showPassword()"
                        onblur="hidePassword()" />

                    <span class="icon-container1" onclick="togglePassword()"
                        style="position: absolute; top: 50%; right: 22px; transform: translateY(-43%); cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-eye-fill" viewBox="0 0 16 16" id="eye-icon">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                            <path
                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                        </svg>
                    </span>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>


            

            <!-- Confirmar Contraseña -->
            <div class="mt-4" style="position: relative;">
                <x-input-label for="password_confirmation" :value="__('')" />
                <div class="input-group" style="position: relative;">
                    <span class="icon-container">
                        <i class="fas fa-key"></i>
                    </span>
                    <x-text-input id="password_confirmation"  class="input block mt-1 w-full" value="Escribe tu contraseña"
                        type="text" name="password_confirmation" required autocomplete="current-password"
                        onfocus="showPassword1()" onblur="hidePassword1()" />

                    <span class="icon-container1" onclick="togglePassword1()"
                        style="position: absolute; top: 50%; right: 22px; transform: translateY(-43%); cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-eye-fill" viewBox="0 0 16 16" id="eye-icon">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                            <path
                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                        </svg>
                    </span>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>



            <button type="submit" class="register-button">Registrarse</button>

            <div class="login-link">
                <a href="{{ route('login') }}" class="login-link" onclick="toggleOverlay()">
                    ¿Ya tienes una cuenta? Inicia Sesión
                </a>
            </div>

        </form>
    </div>

    <script>
        function toggleOverlay() {
            const registerContainer = document.querySelector('.register-container');
            registerContainer.classList.toggle('show-overlay');
        }

        $(document).ready(function() {
            $('#showPassword').change(function() {
                var passwordField = $('#password');
                var fieldType = $(this).is(':checked') ? 'text' : 'password';
                passwordField.attr('type', fieldType);
            });
        });


        function clearNameValue() {
            var nameInput = document.getElementById('name');
            if (nameInput.value === 'Escribe tu nombre') {
                nameInput.value = '';
            }
        }


        function clearEmailValue() {
            var emailInput = document.getElementById('email');
            if (emailInput.value === 'tucorreo@gmail.com') {
                emailInput.value = '';
            }
        }


        function togglePassword() {
            var passwordInput = document.getElementById('password');
            var eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588M5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z"/>
        `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
            `;
            }
        }


        

        function showPassword() {
            var passwordInput = document.getElementById('password');
            if (passwordInput.value === 'Escribe tu contraseña') {
                passwordInput.value = '';
            }
            passwordInput.type = 'password';

        }

        function hidePassword() {
            var passwordInput = document.getElementById('password');
            if (passwordInput.value === '') {
                passwordInput.value = 'Escribe tu contraseña';
                passwordInput.type = 'text';
            }

        }

        function togglePassword1() {
            var passwordInput = document.getElementById('password_confirmation');
            var eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588M5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z"/>
        `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
            `;
            }
        }

        function showPassword1() {
            var passwordInput = document.getElementById('password_confirmation');
            if (passwordInput.value === 'Escribe tu contraseña') {
                passwordInput.value = '';
            }
            passwordInput.type = 'password';

        }

        function hidePassword1() {
            var passwordInput = document.getElementById('password_confirmation');
            if (passwordInput.value === '') {
                passwordInput.value = 'Escribe tu contraseña';
                passwordInput.type = 'text';
            }

        }
    </script>
</body>

</html>
