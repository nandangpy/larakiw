<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/gate/gate.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="" />
    <style>
        .forgot-password {
            font-size: 14px;
            line-height: 20px;
            letter-spacing: 0.3px;
            margin: -10px 0 !important;
        }
    </style>
    <title>Hallo Customer</title>

</head>

<body>
    @include('sweetalert::alert')
    <div class="container" id="container">
        @yield('content')
    </div>

    <script src="{{ asset('assets/gate/script.js') }}"></script>
    <script>
        document.querySelectorAll('.toggle-password').forEach(item => {
            item.addEventListener('click', event => {
                const toggleField = document.querySelector(item.getAttribute('toggle'));
                if (toggleField.type === 'password') {
                    toggleField.type = 'text';
                    item.classList.remove('fa-eye-slash');
                    item.classList.add('fa-eye');
                } else {
                    toggleField.type = 'password';
                    item.classList.remove('fa-eye');
                    item.classList.add('fa-eye-slash');
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('.toggle-passwordR');
            const passwordField = document.querySelector('#passwordR');

            togglePassword.addEventListener('click', function() {
                const type = passwordField.getAttribute('type') === 'passwordR' ? 'text' : 'passwordR';
                passwordField.setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');
                this.classList.toggle('fa-eye');
            });
        });
    </script>
</body>

</html>