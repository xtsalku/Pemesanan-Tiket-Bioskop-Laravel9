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