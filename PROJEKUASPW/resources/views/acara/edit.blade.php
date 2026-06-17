<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Acara</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background: #f5f7fb;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container-box{
            background: white;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            margin-top: 40px;
        }

        .title{
            font-size: 30px;
            font-weight: bold;
            color: #312e81;
            margin-bottom: 25px;
        }

        label{
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control{
            border-radius: 10px;
            padding: 10px;
        }

        .btn-update{
            background: #f59e0b;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: bold;
        }

        .btn-update:hover{
            background: #d97706;
            color: white;
        }

    </style>

</head>
<body>

<div class="container">

    <div class="container-box">

        <h2 class="title">
            Edit Acara
        </h2>

        <form action="{{ route('acara.update', $acara->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Nama Acara</label>

                <input type="text"
                       name="nama_acara"
                       class="form-control"
                       value="{{ $acara->nama_acara }}">

            </div>

            <div class="mb-3">
    <label>Kategori</label>
    <select name="kategori" class="form-control">
        <option value="Musik" {{ $acara->kategori == 'Musik' ? 'selected' : '' }}>Musik</option>
        <option value="Olahraga" {{ $acara->kategori == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
        <option value="Seminar" {{ $acara->kategori == 'Seminar' ? 'selected' : '' }}>Seminar</option>
        <option value="Workshop" {{ $acara->kategori == 'Workshop' ? 'selected' : '' }}>Workshop</option>
        <option value="Festival" {{ $acara->kategori == 'Festival' ? 'selected' : '' }}>Festival</option>
        <option value="Esports" {{ $acara->kategori == 'Esports' ? 'selected' : '' }}>Esports</option>
    </select>
</div>

            <div class="mb-3">

                <label>Deskripsi</label>

                <textarea name="deskripsi"
                          class="form-control"
                          rows="5">{{ $acara->deskripsi }}</textarea>

            </div>

            <div class="mb-3">

                <label>Tanggal</label>

                <input type="date"
                       name="tanggal"
                       class="form-control"
                       value="{{ $acara->tanggal }}">

            </div>

            <div class="mb-3">

                <label>Lokasi</label>

                <input type="text"
                       name="lokasi"
                       class="form-control"
                       value="{{ $acara->lokasi }}">

            </div>

            <button type="submit"
                    class="btn btn-update">

                Update

            </button>

            <a href="/acara"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

</body>
</html>