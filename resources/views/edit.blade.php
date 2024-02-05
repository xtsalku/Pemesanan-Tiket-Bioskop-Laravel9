<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{url('/css/style.css')}}" rel="stylesheet">
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            /* Light background color */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            /* Set the minimum height to 100% of the viewport height */
        }
    </style>
    <title>Edit Tiket</title>
</head>

<body>
    
    <div class="container">
        <br>
    <a href="/" title="Logout">
          <img src="{{ url('/images/back.png') }}" height="30vh" alt="back">
        </a>
        <form action="/pesan/up" method="post">
            <h2 class="text-black">Form Edit</h2>
            @foreach($bioskop as $b)
            @csrf
            <input type="hidden" name="id_user" id="id_user" value="{{$b->id_user}}">
            <br>
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{$b->nama}}" required>
            <br>
            <label for="judul_film" class="form-label">Judul Film:</label>
            <input type="text" name="judul_film" id="judul_film" class="form-control" value="{{$b->judul_film}}" required>
            <br>
            <label for="jam" class="form-label">Jam:</label>
            <input type="text" name="jam" id="jam" class="form-control" value="{{$b->jam}}" required>
            <br>
            <label for="kursi" class="form-label">kursi:</label>
            <input type="text" name="kursi" id="kursi" class="form-control" value="{{$b->kursi}}" required>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
            @endforeach
        </form>
    </div>
    <footer class="bg-dark text-white p-1 foot">
        <div class="container">
            <p class="mt-3">&copy; 2024 Tiketku. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Include Bootstrap JS and Popper.js (diperlukan untuk beberapa komponen) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>