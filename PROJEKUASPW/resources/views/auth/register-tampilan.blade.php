```html
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register - TiketIn</title>

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

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background: linear-gradient(
        135deg,
        var(--bg),
        var(--bg2),
        var(--bg3)
    );
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family:Arial, Helvetica, sans-serif;
    overflow:hidden;
}

.register-card{
    width:500px;
    padding:32px;
    border-radius:var(--radius-lg);
    background:var(--card-bg);
    backdrop-filter:blur(15px);
    border:1px solid var(--card-bdr);
    box-shadow:0 10px 30px rgba(0,0,0,.4);
    position:relative;
    overflow:hidden;
}



.register-card::before{
    content:'';
    position:absolute;
    width:220px;
    height:220px;
    background:rgba(0,245,255,.05);
    border-radius:50%;
    top:-100px;
    right:-100px;
}

.register-card::after{
    content:'';
    position:absolute;
    width:180px;
    height:180px;
    background:rgba(108,47,242,.08);
    border-radius:50%;
    bottom:-90px;
    left:-90px;
}

.brand{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    margin: 0 auto 15px;
    text-align: center;
}



.brand i{
    font-size: 38px;
    color: var(--white);
    line-height: 1;
}

.brand span{
    font-size: 40px;
    font-weight: 700;
    color: var(--white);
    line-height: 1;
}

.brand span b{
    color: var(--cyan);
}

.subtitle{
    color:var(--white);
    font-size:15px;
}

.subtitle2{
    color:var(--muted);
    font-size:13px;
}

label{
    color:var(--white);
    font-size:14px;
    margin-bottom:6px;
    display:block;
}

.form-control{
    background:rgba(255,255,255,.08);
    border:1px solid var(--card-bdr);
    color:var(--white);
    border-radius:var(--radius);
    padding:10px;
}

.form-control::placeholder{
    color:var(--muted);
}

.form-control:focus{
    background:rgba(255,255,255,.1);
    color:var(--white);
    border-color:var(--cyan);
    box-shadow:0 0 15px rgba(0,245,255,.25);
}

.input-group .btn{
    background:rgba(255,255,255,.08);
    border-color:var(--card-bdr);
    color:white;
}

.input-group .btn:hover{
    color:var(--cyan);
}

.btn-register{
    background:linear-gradient(
        135deg,
        var(--violet),
        var(--violet2)
    );
    border:none;
    color:white;
    font-weight:600;
    padding:11px;
    border-radius:var(--radius);
    transition:.3s;
}

.btn-register:hover{
    transform:translateY(-2px);
    box-shadow:0 5px 20px rgba(108,47,242,.4);
}

a{
    text-decoration:none;
    color:var(--muted);
}

a:hover{
    color:var(--cyan);
}

.text-center{
    color:white;
}

</style>
</head>
<body>

<div class="register-card">

  <div class="text-center mb-4">

    <div class="brand">
        <i class="bi bi-ticket-fill"></i>
        <span>Tiket<b>In</b></span>
    </div>

   

</div>

    <div class="text-center mb-4">

        <h5 class="fw-bold">
            Buat Akun Baru 
        </h5>

        <p class="subtitle2">
            Daftar untuk melanjutkan pemesanan di TiketIn
        </p>

    </div>

    <form method="POST" action="{{ route('register') }}">

        @csrf

        <div class="mb-3">

            <label>
                <i class="bi bi-person-fill me-1"></i>
                Nama Lengkap
            </label>

            <input type="text"
                   name="name"
                   class="form-control"
                   placeholder="Masukkan nama lengkap"
                   required>

        </div>

        <div class="mb-3">

            <label>
                <i class="bi bi-envelope-fill me-1"></i>
                Email
            </label>

            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Masukkan email"
                   required>

        </div>

        <div class="mb-3">

            <label>
                <i class="bi bi-lock-fill me-1"></i>
                Password
            </label>

            <div class="input-group">

                <input type="password"
                       id="password"
                       name="password"
                       class="form-control"
                       placeholder="Masukkan password"
                       required>

                <button type="button"
                        class="btn btn-outline-secondary"
                        onclick="togglePassword('password','eyeIcon1')">

                    <i class="bi bi-eye" id="eyeIcon1"></i>

                </button>

            </div>

        </div>

        <div class="mb-4">

            <label>
                <i class="bi bi-shield-lock-fill me-1"></i>
                Konfirmasi Password
            </label>

            <div class="input-group">

                <input type="password"
                       id="confirmPassword"
                       name="password_confirmation"
                       class="form-control"
                       placeholder="Konfirmasi password"
                       required>

                <button type="button"
                        class="btn btn-outline-secondary"
                        onclick="togglePassword('confirmPassword','eyeIcon2')">

                    <i class="bi bi-eye" id="eyeIcon2"></i>

                </button>

            </div>

        </div>

        <button type="submit"
                class="btn btn-register w-100">

            <i class="bi bi-person-plus-fill me-2"></i>
            Buat Akun

        </button>

    </form>

    <div class="text-center mt-4">

        Sudah punya akun?

        <a href="/login">
            Login Sekarang
        </a>

    </div>

</div>

<script>

function togglePassword(inputId, iconId){

    const password = document.getElementById(inputId);
    const eyeIcon = document.getElementById(iconId);

    if(password.type === 'password'){
        password.type = 'text';
        eyeIcon.classList.replace('bi-eye','bi-eye-slash');
    }else{
        password.type = 'password';
        eyeIcon.classList.replace('bi-eye-slash','bi-eye');
    }
}

</script>

</body>
</html>
```
