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
        position:relative;
        background:white;
        border-radius:20px;
        padding:40px;
        box-shadow:0 5px 20px rgba(0,0,0,0.08);
        max-width:700px;
        margin:auto;
        margin-top:50px;
    }

    .close-btn{
        position:absolute;
        top:20px;
        right:20px;
        width:40px;
        height:40px;
        border-radius:50%;
        background:#ef4444;
        color:white;
        text-decoration:none;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:20px;
        font-weight:bold;
    }

    .close-btn:hover{
        background:#dc2626;
        color:white;
    }

    .profile-img{
        width:130px;
        height:130px;
        border-radius:50%;
        object-fit:cover;
        border:4px solid #4f46e5;
    }

    .title{
        color:#312e81;
        font-weight:bold;
    }

    .info-label{
        font-weight:600;
        color:#6b7280;
    }

    .info-value{
        font-size:18px;
        font-weight:500;
    }

    .btn-edit{
        background:#4f46e5;
        color:white;
        border:none;
        padding:10px 20px;
        border-radius:10px;
        font-weight:bold;
        text-decoration:none;
    }

    .btn-edit:hover{
        background:#4338ca;
        color:white;
    }

</style>
```

</head>
<body>

<div class="container">

```
<div class="profile-card">

    <a href="{{ route('user.dashboard') }}"
       class="close-btn">
        ×
    </a>

    <div class="text-center mb-4">

        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
             class="profile-img">

        <h2 class="mt-3 title">
            Profil Saya
        </h2>

    </div>

    <div class="row mb-3">

        <div class="col-md-4 info-label">
            Nama
        </div>

        <div class="col-md-8 info-value">
            {{ auth()->user()->name }}
        </div>

    </div>

    <div class="row mb-3">

        <div class="col-md-4 info-label">
            Email
        </div>

        <div class="col-md-8 info-value">
            {{ auth()->user()->email }}
        </div>

    </div>

    <div class="row mb-4">

        <div class="col-md-4 info-label">
            Tanggal Bergabung
        </div>

        <div class="col-md-8 info-value">
            {{ auth()->user()->created_at->format('d F Y') }}
        </div>

    </div>

    <div class="text-center">

        <a href="{{ route('profile.edit') }}"
           class="btn btn-edit">

            Edit Profil

        </a>

    </div>

</div>
```

</div>

</body>
</html>
