
<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['access_token']) || empty($_SESSION['access_token'])) {
    // Jika pengguna belum login, alihkan ke halaman login
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kampus Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
   
</head>
<body>

     
<header class="navbar navbar-expand-lg bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="asset/logokampus.png" alt="Logo Kampus" width="100" height="100"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#tentang">About</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#galeri">Galeri</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#kontak">Kontak</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Program Studi
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        $jurusan_links = array(
                            "Teknik Informatika" => "jurusan/informatika.php",
                            "Sistem Informasi" => "jurusan/sisteminformasi.php",
                            "Teknik Sipil" => "jurusan/tekniksipil.php",
                            "Administrasi Bisnis" => "jurusan/administrasibisnis.php",
                            "Fisika" => "jurusan/fisika.php"
                        );

                        foreach ($jurusan_links as $nama_jurusan => $link) {
                            echo "<a class='dropdown-item' href='$link'>$nama_jurusan</a>";
                        }
                        ?>
                    </div>
                </li>
                <?php
                // Periksa apakah pengguna sudah login
                if (isset($_SESSION['access_token']) && !empty($_SESSION['access_token'])) {
                    // Jika pengguna sudah login, tampilkan informasi pengguna dan tombol logout
                    $userInfo = $_SESSION['user_info'];
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> Selamat datang, <?php echo $userInfo['name']; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</header>



<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
            <img src="asset/banner1.png" class="d-block w-100" alt="Slide 1" width="1000">
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img src="asset/banner2.png" class="d-block w-100" alt="Slide 2" width="1000">
        </div>
        <div class="carousel-item">
            <img src="asset/banner3.png" class="d-block w-100" alt="Slide 3" width="1000">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card bg-light">
                <div class="card-header">
                    <h2 class="text-center text-primary" id="tentang">Selamat datang di Universitas Tawa - Tawa</h2>
                </div>
                <div class="card-body">
                    <?php
                    echo "<p>";
                    echo "<strong class='text-primary'>Visi Awal:</strong> Kampus Tawa-Tawa lahir dari gagasan para pendiri yang ingin menciptakan lingkungan belajar yang menyenangkan dan inspiratif di mana humor dan komedi menjadi bagian integral dari pendidikan.";
                    echo "<br><br>";
                    echo "<strong class='text-primary'>Perencanaan:</strong> Tim perencanaan kampus melakukan riset mendalam untuk merancang kurikulum yang unik, fasilitas yang sesuai, dan atmosfer yang mendukung untuk mencapai visi mereka. Mereka mengumpulkan masukan dari pakar seni komedi, psikolog, dan pendidik untuk memastikan keberhasilan konsep ini.";
                    echo "<br><br>";
                    echo "<strong class='text-primary'>Pendanaan:</strong> Proyek ini mendapat dukungan dari berbagai sumber, termasuk investor swasta yang percaya pada konsep inovatifnya. Kemitraan dengan perusahaan dan lembaga lain juga membantu memperkuat infrastruktur dan program-program kampus.";
                    echo "<br><br>";
                    echo "<strong class='text-primary'>Pembangunan Fasilitas:</strong> Konstruksi kampus dimulai dengan membangun gedung-gedung modern, laboratorium gelak tawa, studio komedi, auditorium, perpustakaan humor, dan fasilitas pendukung lainnya. Setiap detail dirancang untuk menciptakan atmosfer yang mendukung kreativitas dan hiburan.";
                    echo "<br><br>";
                    echo "<strong class='text-primary'>Rekrutmen Staf:</strong> Proses seleksi staf akademik dan non-akademik dilakukan dengan cermat, mencari individu yang tidak hanya memiliki kualifikasi akademik yang kuat, tetapi juga kepribadian yang ramah dan humoris.";
                    echo "<br><br>";
                    echo "<strong class='text-primary'>Pendafataran Mahasiswa:</strong> Dengan promosi yang kreatif dan kampanye pemasaran yang berfokus pada konsep unik kampus, pendaftaran mahasiswa melonjak. Calon mahasiswa tertarik dengan gagasan belajar sambil tertawa dan menciptakan hubungan sosial yang kuat.";
                    echo "<br><br>";
                    echo "<strong class='text-primary'>Soft Launch:</strong> Sebelum pembukaan resmi, kampus mengadakan acara soft launch yang menyenangkan, termasuk pertunjukan komedi, workshop, dan tur kampus. Ini memberi kesempatan kepada masyarakat untuk mengenal kampus dan merasakan atmosfernya.";
                    echo "<br><br>";
                    echo "<strong class='text-primary'>Pembukaan Resmi:</strong> Pada hari pembukaan resmi, kampus menyelenggarakan acara besar dengan kehadiran tamu-tamu terhormat, pertunjukan komedi, dan perayaan bersama. Kehadiran media membantu memperkenalkan kampus kepada masyarakat secara luas.";
                    echo "<br><br>";
                    echo "Dengan langkah-langkah ini, 'Kampus Tawa-Tawa' diluncurkan dengan sukses dan siap menyambut para mahasiswa yang bersemangat untuk belajar dan tertawa bersama.";
                    echo "</p>";
                    ?>
                </div>
            </div>
        </div>







        <div class="col-md-3">
    <aside class="bg-light p-3 rounded shadow-sm">
        <div class="text-center mb-3">
            <a class="navbar-brand mx-auto" href="#"><img src="asset/logokampus.png" alt="Logo Kampus" width="100" height="100"></a>
        </div>
        <p class="text-center font-weight-bold">UNIVERSITAS TAWA - TAWA</p>
        <hr>
        <div class="hot-news py-3">
    <div class="container px-0">
        <p class="text-center text-warning h5 mb-4"><b>Hot News</b></p>
        <div class="news-marquee">
            <marquee behavior="scroll" direction="up" scrollamount="2" height="300">
                <ul class="list-unstyled">
                    <li class="py-2"><i class="fas fa-bullhorn text-danger"></i> 18 Mei 2024 - Pengumuman Penerimaan Mahasiswa Baru 2024.</li>
                    <li class="py-2"><i class="fas fa-calendar-alt text-primary"></i> 20 Mei 2024 - Webinar: "Masa Depan Pendidikan di Era Digital".</li>
                    <li class="py-2"><i class="fas fa-laugh text-success"></i> 22 Mei 2024 - Lomba Stand-Up Comedy Antar Fakultas.</li>
                    <li class="py-2"><i class="fas fa-trophy text-warning"></i> 24 Mei 2024 - Kompetisi Esports Nasional.</li>
                    <li class="py-2"><i class="fas fa-paint-brush text-info"></i> 26 Mei 2024 - Pameran Seni Rupa Mahasiswa.</li>
                    <li class="py-2"><i class="fas fa-book-reader text-secondary"></i> 28 Mei 2024 - Workshop Penulisan Kreatif.</li>
                    <li class="py-2"><i class="fas fa-music text-purple"></i> 30 Mei 2024 - Konser Musik Kampus.</li>
                    <li class="py-2"><i class="fas fa-hiking text-danger"></i> 1 Juni 2024 - Kegiatan Hiking Bersama Fakultas.</li>
                </ul>
            </marquee>
        </div>
    </div>
</div>

        <hr>
        <p class="text-center font-weight-bold">Data Mahasiswa Baru Yang Lolos Seleksi Tahun 2023/2028</p>
    
        <ul>
            <li><a href="data/index1.php">Info Selengkapnya..</a></li>

    </aside>
</div>



<br><br>

<div class="container" id="galeri">
    <div class="card bg-light">
        <div class="card-header text-center">
            <h2 class="text-primary">Galeri</h2>
        </div>
        <div class="card-body gallery">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <img src="asset/foto1.png" class="img-fluid rounded" alt="Gambar 3"  width="300" height="300">
                </div>
                <div class="col-md-4 mb-3">
                    <img src="asset/foto2.png" class="img-fluid rounded" alt="Gambar 3" width="300" height="300">
                </div>
                <div class="col-md-4 mb-3">
                    <img src="asset/foto3.png" class="img-fluid rounded" alt="Gambar 3" width="300" height="300">
                </div>
                <div class="col-md-4 mb-3">
                    <img src="asset/foto4.png" class="img-fluid rounded" alt="Gambar 3" width="300" height="300">
                </div>
                <div class="col-md-4 mb-3">
                    <img src="asset/foto5.png" class="img-fluid rounded" alt="Gambar 3" width="300" height="300">
                </div>
                <div class="col-md-4 mb-3">
                    <img src="asset/foto6.png" class="img-fluid rounded" alt="Gambar 3" width="300" height="300">
                </div>
                
            </div>
        </div>
    </div>
</div>

<br><br>




<footer class="text-center text-lg-start bg-dark text-muted">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase text-warning">Kontak Kami</h5>
                <p class="text-light">
                    <i class="fas fa-map-marker-alt"></i> Jl. Kebahagiaan No. 123, Kota Tawa<br>
                    <i class="fas fa-envelope"></i> info@kampustawa.ac.id<br>
                    <i class="fas fa-phone"></i> (021) 123-4567
                </p>
            </div>
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase text-warning">Sosial Media</h5>
                <a href="#" class="text-warning me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-warning me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-warning me-4">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="text-warning me-4">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="text-center p-3 text-light" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2024 Kampus Tawa-Tawa
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
 