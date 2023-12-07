<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="js/jquery-3.1.1.min.js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="css/login.css">
    
</head>

<body>
    
    <div class="login-container">
        

        <div class="deco-circle"></div>
        <div class="login-header">INICIAR SESIÓN</div>
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <br>

        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf

            <!-- Email Address -->

            <div>
                <x-input-label for="email" :value="__('')" />
                <div class="input-group">
                    <span class="icon-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-check-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                    </span>
                    <x-text-input id="email" value="tucorreo@gmail.com" class="input block mt-1 w-full"
                        type="email" name="email" : onfocus="clearEmailValue()" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4" style="position: relative;">
                <x-input-label for="password" :value="__('')" />
                <div class="input-group">
                    <span class="icon-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-key-fill" viewBox="0 0 16 16">
                            <path
                                d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                        </svg>
                    </span>
                    <x-text-input id="password" class="input block mt-1 w-full" value="Escribe tu contraseña"
                        type="text" name="password" required autocomplete="current-password" onfocus="showPassword()"
                        onblur="hidePassword()" />
                    <span class="icon-container1" onclick="togglePassword()"
                        style="position: sticky; top: 69%; transform: translateY(-50%);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-eye-fill" viewBox="0 0 16 16" id="eye-icon">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                            <path
                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                        </svg>
                    </span>
                </div>
                <br>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>


            <button type="submit" class="login-button">Iniciar Sesión</button>

            <div class="signup-link" onclick="toggleOverlay()">¿No tienes una cuenta? ¡Regístrate!</div>
        </form>
    </div>

    <script>
        function toggleOverlay() {
            const loginContainer = document.querySelector('.login-container');
            loginContainer.classList.toggle('show-overlay');
        }

        $(document).ready(function() {
            $('#showPassword').change(function() {
                var passwordField = $('#password');
                var fieldType = $(this).is(':checked') ? 'text' : 'password';
                passwordField.attr('type', fieldType);
            });
        });

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

        function clearEmailValue() {
            var emailInput = document.getElementById('email');
            if (emailInput.value === 'tucorreo@gmail.com') {
                emailInput.value = '';
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
    </script>


</body>

</html>
