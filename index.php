<?php
session_start();
require('./dist.php');

if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo '<p>' . $message . '</p>';
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
require('./layout/header.php');
?>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <?php require('./layout/navbar.php'); ?>

    <?php require('./layout/carousel.php'); ?>

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">Guru Berpengalaman</h5>
                            <p>Didukung Pengajar-Pengajar Berpengalaman</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5 class="mb-3">Lab Komputer</h5>
                            <p>Lab Komputer Praktek</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-home text-primary mb-4"></i>
                            <h5 class="mb-3">Teaching Factory</h5>
                            <p>Menghasilan Produk Setiap Jurusan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3">Perpustakaan</h5>
                            <p>Perpustakan Sekolah Ditiap Gedung</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/misivisi.jpeg" alt="" style="object-fit: cover" />
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">
                        Berita Smk Darusalaam
                    </h6>
                    <h1 class="mb-4">
                        Selamat Datang Di Portal Berita Smk Darussalaam
                    </h1>
                    <p class="mb-4">
                        Informasi Adalah Alat Untuk Mengambil Keputusan Dan Kebijakan
                    </p>
                    <p class="mb-4">
                        Berita Tentang Seputar Kegiatan Belajar Mengajar Sekolah
                    </p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0">
                                <i class="fa fa-arrow-right text-primary me-2"></i>Guru
                                Berpengalaman
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0">
                                <i class="fa fa-arrow-right text-primary me-2"></i>Gedung
                                Milik Sendiri
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0">
                                <i class="fa fa-arrow-right text-primary me-2"></i>Lab
                                Komputer Jaringan
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0">
                                <i class="fa fa-arrow-right text-primary me-2"></i>Hatchery
                                Ikan Air Tawar
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0">
                                <i class="fa fa-arrow-right text-primary me-2"></i>Ruang Multi
                                Media
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0">
                                <i class="fa fa-arrow-right text-primary me-2"></i>Lapang
                                Olahraga Lengkap
                            </p>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- berita start -->
    <div class="container-xxl py-2">
        <?php
        require('./layout/artikel.php');
        ?>
    </div>
    <!-- berita end -->

    <!-- video start -->
    <?php
    require('./layout/vidio.php');
    ?>
    <!-- video end -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">
                    Pengajar
                </h6>
                <h1 class="mb-5">Guru Berpengalaman</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/aris.jpeg" alt="" />
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Guru TKJ</h5>
                            <small></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/ap.jpeg" alt="" />
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Guru Agribisnis Perikanan</h5>
                            <small></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/nandan.jpeg" alt="" />
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Nandan</h5>
                            <small></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/ijud.jpeg" alt="" />
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Ijud Zitsu</h5>
                            <small></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">
                    Kesan Pengunjung Web SMK
                </h6>
                <h1 class="mb-5">Beri Kami Masukan</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/smklogo.png" style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Aris Fajarisman</h5>
                    <p>Tkj</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/smklogo.png" style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Restu</h5>
                    <p>Tkj</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/smklogo.png" style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Nandan</h5>
                    <p>Tkj</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/smklogo.png" style="width: 80px; height: 80px" />
                    <h5 class="mb-0">Palahudin</h5>
                    <p>Tkj</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                            amet diam et eos. Clita erat ipsum et lorem et sit.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Footer Start -->
    <?php require('./layout/footer.php'); ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <?php require('./layout/js.php'); ?>

</body>

</html>