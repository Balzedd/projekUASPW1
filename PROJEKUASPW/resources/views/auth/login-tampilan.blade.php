<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - TiketIn</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
:root {
  --bg:       #050A1F;
  --bg2:      #0A1232;
  --bg3:      #0E1740;
  --violet:   #6C2FF2;
  --violet2:  #8A52F5;
  --cyan:     #00F5FF;
  --gold:     #FFD700;
  --rose:     #FF3A6E;
  --white:    #F0F0F5;
  --muted:    #8892B0;
  --card-bg:  rgba(255,255,255,0.04);
  --card-bdr: rgba(255,255,255,0.09);
  --radius:   14px;
  --radius-lg:22px;
}

body{
    background: linear-gradient(
        135deg,
        var(--bg),
        var(--bg2),
        var(--bg3)
    );
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: Arial, Helvetica, sans-serif;
    overflow: hidden;
}

.login-card{
    width: 390px;
    border-radius: var(--radius-lg);
    padding: 32px;
    background: var(--card-bg);
    backdrop-filter: blur(15px);
    border: 1px solid var(--card-bdr);
    box-shadow: 0 10px 30px rgba(0,0,0,0.4);
}

.login-title{
    font-size: 30px;
    font-weight: bold;
    color: var(--cyan);
}

.subtitle{
    color: var(--white);
    margin-bottom: 3px;
    font-size: 15px;
}

.subtitle2{
    color: var(--muted);
    font-size: 13px;
    margin-bottom: 22px;
}

label{
    font-size: 14px;
    font-weight: 500;
    margin-bottom: 6px;
    color: var(--white);
}

.form-control{
    border-radius: var(--radius);
    padding: 10px;
    font-size: 14px;
    background: rgba(255,255,255,0.08);
    border: 1px solid var(--card-bdr);
    color: var(--white);
}

.form-control::placeholder{
    color: var(--muted);
}

.form-control:focus{
    background: rgba(255,255,255,0.1);
    color: var(--white);
    border-color: var(--cyan);
    box-shadow: 0 0 15px rgba(0,245,255,0.25);
}

.btn-login{
    background: linear-gradient(
        135deg,
        var(--violet),
        var(--violet2)
    );
    color: var(--white);
    border-radius: var(--radius);
    padding: 10px;
    font-weight: bold;
    border: none;
    transition: 0.3s;
}

.btn-login:hover{
    background: linear-gradient(
        135deg,
        var(--violet2),
        var(--violet)
    );
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(108,47,242,0.4);
}

.input-group .btn{
    border-radius: 0 var(--radius) var(--radius) 0;
    border-color: var(--card-bdr);
    background: rgba(255,255,255,0.08);
    color: var(--white);
}

.input-group .btn:hover{
    background: rgba(255,255,255,0.15);
    color: var(--cyan);
}

a{
    text-decoration: none;
    font-weight: 500;
    color: var(--muted);
}

a:hover{
    color: var(--cyan);
}

.text-center{
    color: var(--white);
}

.brand{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    margin: 0 auto 20px;
}

.brand i{
    font-size: 36px;
    color: var(--white);
    line-height: 1;
}

.login-title{
    font-size: 38px;
    font-weight: 700;
    color: var(--white);
    line-height: 1;
    margin: 0;
}

.login-title::after{
    content: "In";
    color: var(--cyan);
}

.divider{
    position: relative;
    text-align: center;
}

.divider::before{
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    top: 50%;
    height: 1px;
    background: rgba(255,255,255,.15);
}

.divider span{
    position: relative;
    padding: 0 15px;
    background: var(--bg2);
    color: var(--muted);
    font-size: 14px;
}

.form-check-label{
    color: var(--muted);
    font-size: 14px;
}

.login-card{
    position: relative;
    overflow: hidden;
}

.login-card{
    width: 450px;
}

.login-card::before{
    content: "";
    position: absolute;
    width: 220px;
    height: 220px;
    background: rgba(0,245,255,.05);
    border-radius: 50%;
    top: -100px;
    right: -100px;
}

.login-card::after{
    content: "";
    position: absolute;
    width: 180px;
    height: 180px;
    background: rgba(108,47,242,.08);
    border-radius: 50%;
    bottom: -90px;
    left: -90px;
}

    </style>

</head>
<body>

   <div class="login-card">

    <!-- Logo -->
    <div class="text-center mb-4">
        

      <div class="brand">
    <i class="bi bi-ticket-fill"></i>
    <span class="login-title">Tiket</span>
</div>

      
    </div>

    <!-- Welcome Text -->
    <div class="text-center mb-4">
        <h5 class="fw-bold text-light">
            Selamat Datang Kembali
        </h5>

        <p class="subtitle2">
            Login untuk melanjutkan pemesanan di TiketIn
        </p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        
        <div class="mb-3">
            <label>
                <i class="bi bi-envelope-fill me-1"></i>
                Email
            </label>

            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Masukkan email">
        </div>

       
        <div class="mb-4">
            <label>
                <i class="bi bi-lock-fill me-1"></i>
                Password
            </label>

            <div class="input-group">

                <input type="password"
                       id="password"
                       name="password"
                       class="form-control"
                       placeholder="Masukkan password">

                <button type="button"
                        class="btn btn-outline-secondary"
                        onclick="togglePassword()">

                    <i class="bi bi-eye" id="eyeIcon"></i>

                </button>

            </div>
        </div>

     
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div class="form-check">
                
            </div>

            <a href="#">
                Lupa Password?
            </a>

        </div>

       
        <button type="submit"
                class="btn btn-login w-100">

            <i class="bi bi-box-arrow-in-right me-2"></i>
            Login Sekarang

        </button>

    </form>

    
    <div class="divider my-4">
        <span>atau</span>
    </div>

  
    <div class="text-center">
        Belum punya akun?

        <a href="/register">
            Daftar Sekarang
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