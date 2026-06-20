<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>

```
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

    body{
        background:#f5f7fb;
        font-family:Arial, Helvetica, sans-serif;
    }

    .profile-card{
        background:white;
        border-radius:20px;
        padding:40px;
        box-shadow:0 5px 20px rgba(0,0,0,0.08);
    }

    .profile-img{
        width:120px;
        height:120px;
        border-radius:50%;
        object-fit:cover;
        border:4px solid #4f46e5;
    }

    .title{
        color:#312e81;
        font-weight:bold;
    }

    .btn-save{
        background:#4f46e5;
        color:white;
        border:none;
    }

    .btn-save:hover{
        background:#4338ca;
        color:white;
    }

    .card-password{
        background:white;
        border-radius:20px;
        padding:30px;
        box-shadow:0 5px 20px rgba(0,0,0,0.08);
        margin-top:25px;
    }

</style>
```

</head>
<body>

<div class="container py-5">

```
<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="profile-card">

            <div class="text-center mb-4">

                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                     class="profile-img">

                <h2 class="mt-3 title">
                    Profil Saya
                </h2>

            </div>

            <form>

                <div class="mb-3">

                    <label class="form-label">
                        Nama Lengkap
                    </label>

                    <input type="text"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input type="email"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Nomor HP
                    </label>

                    <input type="text"
                           class="form-control">

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Tanggal Bergabung
                    </label>

                    <input type="text"
                           class="form-control"
                           readonly>

                </div>

                <button type="submit"
                        class="btn btn-save">

                    Simpan Perubahan

                </button>

            </form>

        </div>

        <div class="card-password">

            <h4 class="mb-4 title">
                Ubah Password
            </h4>

            <form>

                <div class="mb-3">

                    <label>Password Lama</label>

                    <input type="password"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label>Password Baru</label>

                    <input type="password"
                           class="form-control">

                </div>

                <div class="mb-4">

                    <label>Konfirmasi Password Baru</label>

                    <input type="password"
                           class="form-control">

                </div>

                <button type="submit"
                        class="btn btn-warning">

                    Ubah Password

                </button>

            </form>

        </div>

    </div>

</div>
```

</div>

</body>
</html>
