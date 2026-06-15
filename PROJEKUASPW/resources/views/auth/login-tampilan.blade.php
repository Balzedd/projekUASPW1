<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - TiketIn</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background: linear-gradient(to right, #4f46e5, #7c3aed);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;
            overflow: hidden;
        }

        .login-card{
            width: 390px;
            border-radius: 20px;
            padding: 32px;
            background: white;
            border: none;
            box-shadow: 0 10px 25px rgba(0,0,0,0.20);
        }

        .login-title{
            font-size: 30px;
            font-weight: bold;
            color: #4f46e5;
        }

        .subtitle{
            color: #6b7280;
            margin-bottom: 3px;
            font-size: 15px;
        }

        .subtitle2{
            color: #9ca3af;
            font-size: 13px;
            margin-bottom: 22px;
        }

        label{
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 6px;
        }

        .form-control{
            border-radius: 10px;
            padding: 10px;
            font-size: 14px;
        }

        .form-control:focus{
            border-color: #4f46e5;
            box-shadow: 0 0 0 0.15rem rgba(79,70,229,0.2);
        }

        .btn-login{
            background: #4f46e5;
            color: white;
            border-radius: 10px;
            padding: 10px;
            font-weight: bold;
            transition: 0.3s;
            border: none;
        }

        .btn-login:hover{
            background: #4338ca;
            color: white;
        }

        .input-group .btn{
            border-radius: 0 10px 10px 0;
        }

        a{
            text-decoration: none;
            font-weight: 500;
            color: #4f46e5;
        }

        a:hover{
            color: #4338ca;
        }

    </style>

</head>
<body>

    <div class="login-card">

        <h2 class="login-title text-center">
            TiketIn 🎫
        </h2>

        <p class="subtitle text-center">
            Selamat Datang Kembali
        </p>

        <p class="subtitle2 text-center">
            Login untuk membeli tiket event favoritmu
        </p>

        <form method="POST" action="{{ route('login') }}" autocomplete="off">

            @csrf

            <div class="mb-3">

                <label>
                    Email
                </label>

                <input type="email"
                       name="email"
                       class="form-control"
                       placeholder="Masukkan email"
                       autocomplete="off"
                       required>

            </div>

            <div class="mb-4">

                <label>
                    Password
                </label>

                <div class="input-group">

                    <input type="password"
                           name="password"
                           id="password"
                           class="form-control"
                           placeholder="Masukkan password"
                           autocomplete="new-password"
                           required>

                    <button type="button"
                            class="btn btn-outline-secondary"
                            onclick="togglePassword()">

                        <i class="bi bi-eye" id="eyeIcon"></i>

                    </button>

                </div>

            </div>

            <button type="submit"
                    class="btn btn-login w-100">

                Login

            </button>

        </form>

        <div class="text-center mt-4">

            Belum punya akun?
            <a href="/register">
                Register
            </a>

        </div>

    </div>

    <script>

        function togglePassword(){

            const password = document.getElementById('password');

            const eyeIcon = document.getElementById('eyeIcon');

            if(password.type === 'password'){

                password.type = 'text';

                eyeIcon.classList.remove('bi-eye');

                eyeIcon.classList.add('bi-eye-slash');

            }else{

                password.type = 'password';

                eyeIcon.classList.remove('bi-eye-slash');

                eyeIcon.classList.add('bi-eye');

            }

        }

    </script>

</body>
</html>