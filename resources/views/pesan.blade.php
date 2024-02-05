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

        #kursi {
            display: none;
        }

        #kursiModal table {
            margin: 0;
        }

        * {
            margin: 0;
            padding: 0;
        }

        /* Atau spesifik untuk elemen select */
        select {
            margin: 0;
            padding: 0;
        }
    </style>
    <title>Pesan Tiket</title>
</head>

<body>

    <div class="container">
        <br>
        <a href="/" title="Logout">
            <img src="{{ url('/images/back.png') }}" height="30vh" alt="back">
        </a>
        <form action="/pesan/add" method="post">
            <h2 class="text-black">Form Pemesanan</h2>
            @csrf
            <input type="hidden" name="id_user" id="id_user" value="{{$id}}">
            <br>
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{$nama}}" readonly required>
            <br>
            <label for="judul_film" class="form-label">Judul Film:</label>
            <input type="text" name="judul_film" id="judul_film" class="form-control" readonly value="{{ request('film') }}" required>
            <br>
            <label for="jam" class="form-label">Jam:</label>
            <select name="jam" id="jam" class="form-select" required>
                <option value="1">06:00 - 08:00</option>
                <option value="2">09:00 - 11:00</option>
                <option value="3">12:00 - 14:00</option>
                <option value="4">15:00 - 17:00</option>
                <option value="5">18:00 - 20:00</option>
            </select><br>
            <label for="kursi" class="form-label">kursi:</label>
            <select type="text" name="kursi" id="kursi" class="form-select" >
                <option value="0" disabled selected>no kursi</option>
            </select>
            <input type="text" class="form-label" name="selected_kursi" id="selected_kursi" readonly value="">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kursiModal">
                Pilih Kursi
            </button><br><br><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="modal fade" id="kursiModal" tabindex="-1" aria-labelledby="kursiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kursiModalLabel">Pilih Kursi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table container">
                        <thead>
                            <tr>
                                <th scope="col">Nomor Kursi</th>
                                <!-- Tambahkan kolom lainnya jika diperlukan -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#" class="select-kursi" data-kursi="A1">A1</a></td>
                                <td><a href="#" class="select-kursi" data-kursi="A2">A2</a></td>
                                <td><a href="#" class="select-kursi" data-kursi="A3">A3</a></td>
                                <td><a href="#" class="select-kursi" data-kursi="A4">A4</a></td>
                                <td><a href="#" class="select-kursi" data-kursi="A5">A5</a></td>
                                <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                            </tr>
                            <tr>
                                <td><a href="#" class="select-kursi" data-kursi="B1">B1</a></td>
                                <td><a href="#" class="select-kursi" data-kursi="B2">B2</a></td>
                                <td><a href="#" class="select-kursi" data-kursi="B3">B3</a></td>
                                <td><a href="#" class="select-kursi" data-kursi="B4">B4</a></td>
                                <td><a href="#" class="select-kursi" data-kursi="B5">B5</a></td>
                                <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                            </tr>
                            <tr>
                                <td><a href="#" class="select-kursi" data-kursi="C1">C1</a></td>
                                <td><a href="#" class="select-kursi" data-kursi="C2">C2</a></td>
                                <td><a href="#" class="select-kursi" data-kursi="C3">C3</a></td>
                                <td><a href="#" class="select-kursi" data-kursi="C4">C4</a></td>
                                <td><a href="#" class="select-kursi" data-kursi="C5">C5</a></td>
                                <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white p-1 foot">
        <div class="container">
            <p class="mt-3">&copy; 2024 Tiketku. All Rights Reserved.</p>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectKursiLinks = document.querySelectorAll('.select-kursi');
            const kursiModal = new bootstrap.Modal(document.getElementById('kursiModal'));

            selectKursiLinks.forEach(link => {
                link.addEventListener('click', function() {
                    const selectedKursi = this.getAttribute('data-kursi');
                    document.getElementById('kursi').value = selectedKursi;
                    document.getElementById('selected_kursi').value = selectedKursi;

                    // Tutup modal setelah memilih kursi
                    kursiModal.hide();
                });
            });
        });
    </script>
    <!-- Include Bootstrap JS and Popper.js (diperlukan untuk beberapa komponen) -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>