<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tiket Bioskop</title>
  <!-- Sertakan file Bootstrap CSS -->
  <link href="{{url('/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('/css/login.css')}}" rel="stylesheet">
  <link href="{{url('/css/tiket.css')}}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url('https://media.21cineplex.com/webcontent/gallery/pictures/152031776970975_1024x683.jpg');
      /* Ganti dengan path gambar latar belakang bioskop */
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      color: #ffffff;
      /* Warna teks jika gambar latar belakang gelap */
    }

    .navbar {
      transition: top 0.5s ease-in-out;
    }

    .navbar-scrolled {
      top: -80px;
      /* Sesuaikan dengan tinggi navbar */
    }
    .images{
    height: 500px;
    width: auto;
}

.kotak{
    height: 600px;
    width: auto;
}
main {
    flex: 1; /* Allow the main content to take up remaining space */
}

form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff; /* White background color */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 50px;
    margin-bottom: 60px;
}

.foot {
    background-color: #343a40; 
    color: #ffffff; 
    padding: 1rem; 
    text-align: center; 
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 50px
}

/* .footer {
    background-color: #343a40; 
    color: #ffffff;
    padding: 1rem; 
    text-align: left; 
} */
.container1 {
    width: 300px;
    padding: 16px;
    background-color: white;
    margin: 0 auto;
    margin-top: 100px;
    border: 1px solid black;
    border-radius: 4px;
}

/* Style the input fields and the submit button */
input[type=text], input[type=password] {
    width: 90%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

.container1 button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.container1 button:hover {
    opacity:1;
}
/* Add this CSS to your existing styles or in a separate stylesheet */

.alert-danger {
background-color: #f44336; /* Warna latar belakang merah */
color: white; /* Warna teks putih */
padding: 15px; /* Ruang dalam di sekitar teks */
margin-bottom: 15px; /* Jarak bawah dari elemen berikutnya */
border-radius: 4px; /* Sudut bulat pada tepi */
}

.alert-danger ul {
list-style: none; /* Hapus penomoran daftar (bullet points) */
padding: 0; /* Hapus padding default daftar */
margin: 0; /* Hapus margin default daftar */
}

.alert-danger li {
margin-bottom: 5px; /* Jarak bawah antara item daftar */
}

/* css tiket */
.container2{
    background-color: gray;
}
#content {
    flex: 1;
    padding: 20px;
    transition: margin-left 0.3s;
}

.toggle-btn {
    font-size: 24px;
    cursor: pointer;
    color: #f1f0ec;
}


table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #1d0606;
    text-align: left;
    padding: 8px;
}

th {
    background-color: #110f0f;
}


/* end css tiket */
  </style>
</head>

<body>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-blac " style="background-color: gray;">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="/">
        <h5>Tiketku</h5>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" onclick="closeNavbar()">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="#komedi">Komedi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#trending">Trending</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#aksi">Petualangan dan Aksi</a>
          </li>
          @auth
          @if(Auth::user()->role=='user')
          <li class="nav-item">
            <a class="nav-link text-white" onclick="changePage('tiket')">Tiket Saya</a>
          </li>
          @endif
          @endauth

        </ul>
        <!-- <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
        @auth
        @if(Auth::user()->role=='user')
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link text-white" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm0 1a7 7 0 1 1 0 14A7 7 0 0 1 8 1zm0 7a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
              </svg>
              {{ Auth::user()->nama }}
            </a>
          </li>
        </ul>
        <a href="/logout" title="Logout">
          <img src="{{ url('/images/logout.png') }}" height="30vh" alt="Logout">
        </a>




        @endif
        @else
        <ul class="navbar-nav ml-auto">
          <li class="nav-item m-2">
            <button class="btn btn-outline-success">
              <a class="nav-link text-white" onclick="changePage('login')">Login</a>
            </button>
          </li>
          <li class="nav-item m-2">
            <button class="btn btn-outline-success">
              <a class="nav-link text-white" onclick="changePage('register')">Register</a>
            </button>
          </li>
        </ul>
        @endauth

      </div>
    </div>
  </nav>
  </header>
  <br> <br>
  <main id="content" class="">
    <div class="container-fluid mt-5 ">
      <h1 class="text-center mb-4 text-black">List Film</h1>

      <!-- Kategori Film  -->
      <section class="mb-5">
        <h2 class="text-center mb-3 text-black" id="komedi">Film Komedi terkini</h2>
        <div class="row ">
          <div class="col-md-4 m-2 ">
            <div class="card p-2 m-10">
              <img src="{{ url('/images/komedi/adamertua.jpg') }}" class="card-img-top images" alt="Aksi 1">
              <div class="card-body">
                <h5 class="card-title text-center">Ada Mertua Dirumahku</h5>
                <p class="card-text text-center">Kisah berawal dari hari pernikahan Irfan dan Nirmala. Ketika proses akad, datanglah seorang laki-laki yang ternyata ayah kandung dari Nirmala, yakni Bambang. Nirmala yang memang sangat kesal dengan ayahnya, akhirnya memutuskan untuk mencoba hidup lagi dengan ayahnya.</p>
                @auth
                <a href="{{ url('/pesan') }}?id={{ Auth::id() }}&film=Ada Mertua Dirumahku" class="btn btn-primary">Pesan</a>
                @endauth
              </div>
            </div>
          </div>

          <div class="col-md-4 m-2 ">
            <div class="card p-2 m-10 ">
              <img src="{{ url('/images/komedi/gaspol.jpg') }}" class="card-img-top images" alt="Aksi 2">
              <div class="card-body ">
                <h5 class="card-title text-center">Kejar Mimpi Gaspol</h5>
                <p class="card-text text-center">Kisah perjuangan seorang ibu tunggal bernama Fifi, yang mengorbankan cita-citanya sebagai penulis terkenal untuk menjadi tulang punggung keluarga dengan menjadi sopir jeep di wilayah Gunung Bromo. Namun, kehidupan Fifi dan keluarganya berubah secara tak terduga ketika seorang pria masuk dalam kehidupan mereka.</p>
                @auth
                <a href="{{ url('/pesan') }}?id={{ Auth::id() }}&film=Kejar Mimpi Gaspol" class="btn btn-primary">Pesan</a>
                @endauth
              </div>
            </div>
          </div>

          <div class="col-md-4 m-2 ">
            <div class="card p-2 m-10 ">
              <img src="{{ url('/images/komedi/onde.jpg') }}" class="card-img-top images" alt="Aksi 2">
              <div class="card-body ">
                <h5 class="card-title text-center">Onde Mande</h5>
                <p class="card-text text-center">Berkisah tentang seorang pensiunan guru dan tetua Desa Sigiran bernama Angku Wan yang memenangkan undian Rp2 miliar dari perusahaan sabun. Namun ia meninggal sebelum mengambil hadiahnya.</p>
                @auth
                <a href="{{ url('/pesan') }}?id={{ Auth::id() }}&film=Onde Mande" class="btn btn-primary">Pesan</a>
                @endauth
              </div>
            </div>
          </div>

        </div>
      </section>

      <!-- Kategori Film 2 -->
      <section class="mb-5">
        <h2 class="text-center mb-3 text-black" id="aksi">Petualangan dan Aksi</h2>
        <div class="row">
          <div class="col-md-4 m-2">
            <div class="card p-2 m-10">
              <img src="{{url('/images/aksi/avatar.jpg')}}" class="card-img-top images" alt="Komedi 1">
              <div class="card-body">
                <h5 class="card-title">Avatar</h5>
                <p class="card-text">Avatar menghadirkan dunia Pandora yang indah dan ajaib. Jake Sully, seorang marinir paraplegia, terlibat dalam misi rahasia di planet tersebut. Jake menjalani transformasi fisik dan emosional saat menjelajahi budaya suku Na’vi dan melibatkan diri dalam perjuangan antara alam dan manusia.</p>
                @auth
                <a href="{{ url('/pesan') }}?id={{ Auth::id() }}&film=Avatar" class="btn btn-primary">Pesan</a>
                @endauth
              </div>
            </div>
          </div>

          <div class="col-md-4 m-2">
            <div class="card p-2 m-10">
              <img src="{{url('/images/aksi/jungle.jpg')}}" class="card-img-top images" alt="Komedi 2">
              <div class="card-body">
                <h5 class="card-title">The jungle book</h5>
                <p class="card-text">Mowgli, seorang anak laki-laki yang dibesarkan oleh serigala, menavigasi hutan India yang indah tapi berbahaya. Dia berinteraksi dengan binatang-binatang yang menarik dan menghadapi tantangan untuk menemukan jati dirinya..</p>
                @auth
                <a href="{{ url('/pesan') }}?id={{ Auth::id() }}&film=The Jungle Book" class="btn btn-primary">Pesan</a>
                @endauth
              </div>
            </div>
          </div>

          <!-- Tambahkan film lainnya di sini -->
        </div>
      </section>

      <!-- Tambahkan kategori film lainnya di sini -->

    </div>
    <footer class="bg-dark text-white text-center p-4 mt-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mx-auto">

            @if(Auth::check() && Auth::user()->role == 'user')
            <p>Welcome {{ Auth::user()->nama }}!</p>
            @else
            <p>Silahkan Login/Register Untuk Melakukan Pemesanan <i class="bi bi-heart text-danger"></i></p>
            @endif



            <p>&copy; 2024 Tiketku. All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </footer>
  </main>
  <!-- Sertakan file Bootstrap JavaScript dan Popper.js (diperlukan untuk beberapa komponen) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function closeNavbar() {
    // Dapatkan elemen tombol toggler dan navbar
    var toggler = document.querySelector('.navbar-toggler');
    var navbarCollapse = document.querySelector('.navbar-collapse');

    // Tutup navbar jika sedang terbuka
    if (navbarCollapse.classList.contains('show')) {
      toggler.click(); // Klik tombol toggler untuk menutup navbar
    }
  }
    // Fungsi untuk mengganti konten halaman tanpa me-reload
    function changePage(page) {
      // Mendapatkan elemen konten
      var contentElement = document.getElementById('content');

      // Mengganti konten sesuai dengan halaman yang dipilih
      switch (page) {
        case 'pesan':
          contentElement.innerHTML = '<div class="container">' +
            '<form action="/pesan/add" method="post">' +
            '@csrf' +
            '<label for="nama" class="form-label">Nama:</label>' +
            '<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama" required>' +
            '<br>' +
            '<label for="judul_film" class="form-label">Judul Film:</label>' +
            '<input type="text" name="judul_film" id="judul_film" class="form-control" value="{{ request("film") }}" required>' +
            '<br>' +
            '<label for="jam" class="form-label">Jam:</label>' +
            '<input type="text" name="jam" id="jam" class="form-control" required>' +
            '<br>' +
            '<button type="submit" class="btn btn-primary">Submit</button>' +
            '</form>' +
            '</div>';
          break;
        case 'login':
          contentElement.innerHTML =
            '<form action="/login" method="post">' +
            '<h2 class="text-black">Login Form</h2>' + '@csrf' +
            '<div class="container1">' +
            '@if($errors->any())' +
            '<div class="alert-danger">' +
            '<ul>' +
            '@foreach($errors->all() as $item)' +
            '<li>{{ $item }}</li>' +
            '@endforeach' +
            '</ul>' +
            '</div>' +
            '@endif' +
            '<label for="uname"><b>Username</b></label>' +
            '<input type="text" value="{{ old("username") }}" placeholder="Username" name="username">' +
            '<label for="psw"><b>Password</b></label>' +
            '<input type="password" placeholder="Password" name="password">' +
            '<br>' +
            '<button type="submit">Login</button>' +
            '</div>' +
            '</form>';
          break;

        case 'register':
          contentElement.innerHTML = '<form action="/register" method="post">' +
            '@csrf' +
            '<h2 class="text-black">Register Form</h2>' +
            '<div class="container1">' +
            '@if($errors->any())' +
            '<div class="alert-danger">' +
            '<ul>' +
            '@foreach($errors->all() as $item)' +
            '<li>{{$item}}</li>' +
            '@endforeach' +
            '</ul>' +
            '</div>' +
            '@endif' +
            '<label for="nama"><b>Nama</b></label>' +
            '<input type="text" placeholder="Nama Lengkap" name="nama" >' +
            '<label for="username"><b>Username</b></label>' +
            '<input type="text" placeholder="Username" name="username" >' +
            '<label for="password"><b>Password</b></label>' +
            '<input type="password" placeholder="Password" name="password" >' +
            '<button type="submit">Register</button>' +
            '</div>' +
            '</form>';
          break;


        case 'tiket':
          contentElement.innerHTML = '<div class="container2">' +
            '@if(count($bioskop) > 0 )' +
            '<table>' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Nama</th>' +
            '<th>Judul Film</th>' +
            '<th>Jam</th>' +
            '<th>Kursi</th>' +
            '<th>opsi</th>' +
            '</tr>' +
            '</thead>' +
            '<tbody>' +
            '@foreach($bioskop as $index => $b)' +
            '<tr>' +
            '<td>{{ $index + 1 }}</td>' +
            '<td>{{$b->nama}}</td>' +
            '<td>{{$b->judul_film}}</td>' +
            '<td>{{$b->jam}}</td>' +
            '<td>{{$b->kursi}}</td>' +
            '<td><a href="/delete/{{encrypt($b->id)}}" class="btn btn-primary">hapus</a>' +
            '<a href="/edit/{{encrypt($b->id)}}" class="btn btn-warning">edit</a></td>' +
            '</tr>' +
            '@endforeach' +
            '</tbody>' +
            '</table>' +
            '@else' +
            '<table>' +

            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Nama</th>' +
            '<th>Judul Film</th>' +
            '<th>Jam</th>' +
            '<th>Kursi</th>' +
            '<th>opsi</th>' +
            '<th>opsi</th>' +
            '</tr>' +
            '</thead>' +
            '</table>' +
            '<center>' +
            '<h2>Tidak Ada Data Peminjaman Buku</h2>' +
            '</center>' +
            '@endif' +
            '</div>'
          break;
        default:
          contentElement.innerHTML = '<h2>Page Not Found</h2>';
      }
    }
  </script>
</body>

</html>