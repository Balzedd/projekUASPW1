<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Acara</title>

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

        .btn-simpan{
            background: #4f46e5;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: bold;
        }

        .btn-simpan:hover{
            background: #4338ca;
            color: white;
        }

        .btn-kembali{
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: bold;
        }

    </style>

</head>
<body>

    <div class="container">

        <div class="container-box">

            <h2 class="title">
                Tambah Acara
            </h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('acara.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label>Nama Acara</label>

                    <input type="text"
                           name="nama_acara"
                           class="form-control"
                           placeholder="Masukkan nama acara">

                </div>

                <div class="mb-3">

                    <label>Deskripsi</label>

                    <textarea name="deskripsi"
                              class="form-control"
                              rows="5"
                              placeholder="Masukkan deskripsi acara"></textarea>

                </div>

                <div class="mb-3">

                    <label>Tanggal Acara</label>

                    <input type="date"
                           name="tanggal"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label>Lokasi</label>

                    <input type="text"
                           name="lokasi"
                           class="form-control"
                           placeholder="Masukkan lokasi acara">

                </div>

                <div class="mb-4">

                    <label>Upload Poster</label>

                    <input type="file"
                           name="gambar"
                           class="form-control">

                </div>

                <button type="submit"
                        class="btn btn-simpan">

                    Simpan

                </button>

                <a href="/acara"
                   class="btn btn-secondary btn-kembali">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</body>
</html>