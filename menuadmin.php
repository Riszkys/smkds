<!DOCTYPE html>
<html lang="en">

<?php
session_start();

require('./layout/header.php');
require('./dist.php');

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];

    if ($type === 'artikel') {
        if (deleteArtikel($id)) {
            header('Location: menuadmin.php');
        } else {
            echo 'Gagal menghapus data artikel.';
        }
    } elseif ($type === 'carousel') {
        if (deleteSlider($id)) {
            header('Location: menuadmin.php');
        } else {
            echo 'Gagal menghapus data carousel.';
        }
    } elseif ($type === 'vidio') {
        if (deleteVideo($id)) {
            header('Location: menuadmin.php');
        } else {
            echo 'Gagal menghapus data carousel.';
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submitForm1'])) { // Form pertama carousel
        $foto = $_FILES['foto'];
        $title = $_POST['title'];
        $keterangan = $_POST['keterangan'];

        $targetDir = 'assets/carousel/';
        $newFileName = uniqid() . '_' . basename($foto['name']);
        $targetPath = $targetDir . $newFileName;

        if (move_uploaded_file($foto['tmp_name'], $targetPath)) {
            require('koneksi.php');

            $query = "INSERT INTO banner_slider (foto, keterangan, title) VALUES ('$newFileName', '$keterangan', '$title')";
            if ($conn->query($query)) {
                header('Location: menuadmin.php');
                exit();
            } else {
                echo 'Gagal menyimpan data ke database.';
            }
        } else {
            echo 'Gagal mengunggah file.';
        }
    } elseif (isset($_POST['submitForm2'])) { // Form kedua
        $foto = $_FILES['foto'];
        $judul = $_POST['judul'];
        $isi = $_POST['keterangan'];

        $targetDir = 'assets/artikel/';
        $newFileName = uniqid() . '_' . basename($foto['name']);
        $targetPath = $targetDir . $newFileName;

        // Kompresi dan ubah ukuran gambar
        $compressedImage = compressAndResizeImage($foto['tmp_name'], 800, 800); // Ubah ukuran sesuai kebutuhan

        if (imagejpeg($compressedImage, $targetPath, 80)) {
            require('koneksi.php');

            $query = "INSERT INTO artikel (foto, judul, keterangan) VALUES ('$newFileName', '$judul', '$isi')";
            if ($conn->query($query)) {
                header('Location: menuadmin.php');
                exit();
            } else {
                echo 'Gagal menyimpan data ke database.';
            }

            imagedestroy($compressedImage); // Hapus gambar dari memori setelah digunakan
        } else {
            echo 'Gagal mengunggah file.';
        }
    } elseif (isset($_POST['submitForm3'])) {
        $video = $_FILES['video'];
        $thumbnail = $_FILES['thumbnail'];
        $judul = $_POST['judul_video'];
        $keterangan = $_POST['keterangan'];

        $videoTargetDir = './assets/vidio/';
        $thumbnailTargetDir = './assets/vidio/thumbnail/';

        $newVideoFileName = uniqid() . '_' . basename($video['name']);
        $newThumbnailFileName = uniqid() . '_' . basename($thumbnail['name']);

        $videoTargetPath = $videoTargetDir . $newVideoFileName;
        $thumbnailTargetPath = $thumbnailTargetDir . $newThumbnailFileName;

        if (move_uploaded_file($video['tmp_name'], $videoTargetPath) && move_uploaded_file($thumbnail['tmp_name'], $thumbnailTargetPath)) {
            require('koneksi.php');

            $judul = mysqli_real_escape_string($conn, $judul);
            $keterangan = mysqli_real_escape_string($conn, $keterangan);
            $newVideoFileName = mysqli_real_escape_string($conn, $newVideoFileName);
            $newThumbnailFileName = mysqli_real_escape_string($conn, $newThumbnailFileName);

            $query = "INSERT INTO video (video, thumbnail, judul_video, keterangan) VALUES ('$newVideoFileName', '$newThumbnailFileName', '$judul', '$keterangan')";
            if ($conn->query($query)) {
                header('Location: menuadmin.php');
                exit();
            } else {
                echo 'Gagal menyimpan data ke database.';
            }
        } else {
            echo 'Gagal mengunggah file.';
        }
    } elseif (isset($_POST['gantiCarousel'])) {
        $id = $_POST['id']; // Jika id juga dikirimkan sebagai input hidden pada form
        $judul = $_POST['title'];
        $keterangan = $_POST['keterangan'];
        $foto = $_FILES['foto'];

        // Lakukan validasi dan pengolahan file foto jika diperlukan

        if (updateSlider($id, $judul, $foto, $keterangan)) {
            header('Location: menuadmin.php');
            exit();
        } else {
            echo 'Gagal memperbarui data.';
        }
    } elseif (isset($_POST['gantiArtikel'])) {
        $id = $_POST['id']; // Jika id juga dikirimkan sebagai input hidden pada form
        $judul = $_POST['judul'];
        $keterangan = $_POST['keterangan'];
        $foto = $_FILES['foto'];

        // Lakukan validasi dan pengolahan file foto jika diperlukan

        if (updateArtikel($id, $judul, $foto, $keterangan)) {
            header('Location: menuadmin.php');
            exit();
        } else {
            echo 'Gagal memperbarui data.';
        }
    } elseif (isset($_POST['gantiVidio'])) {
        $id = $_POST['id'];
        $judul = $_POST['judul_video'];
        $keterangan = $_POST['keterangan'];
        $video = $_FILES['video'];
        $thumbnail = $_FILES['thumbnail'];

        // Lakukan validasi dan pengolahan file video dan thumbnail jika diperlukan

        if (updateVideo($id, $judul, $video, $thumbnail, $keterangan)) {
            header('Location: menuadmin.php');
            exit();
        } else {
            echo 'Gagal memperbarui data.';
        }
    }
}
?>


<body>
    <!-- Spinner Start -->
    <!-- <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> -->
    <!-- Spinner End -->


    <?php require('./layout/navbar.php'); ?>

    <!-- content start -->
    <div class="container">
        <div class="row py-3 pt-5">
            <div class="col">
                <div class="row my-2">
                    <div class="col">
                        <?php require('./layout/buttoncarousel.php') ?>
                    </div>
                </div>
                <div class="row my-2">
                    <?php require('./layout/tablecarousel.php') ?>
                </div>
            </div>
        </div>

        <div class="row py-3">
            <div class="col">
                <div class="row my-2">
                    <div class="col">
                        <?php require('./layout/buttonartikel.php') ?>
                    </div>
                </div>
                <div class="row my-2">
                    <?php require('./layout/tableartikel.php') ?>
                </div>
            </div>
        </div>

        <div class="row py-3">
            <div class="col">
                <div class="row my-2">
                    <div class="col">
                        <?php require('./layout/buttonvidio.php') ?>
                    </div>
                </div>
                <div class="row my-2">
                    <?php require('./layout/tablevidio.php') ?>
                </div>
            </div>
        </div>
    </div>
    <!-- content end -->

    <!-- Footer Start -->
    <?php require('./layout/footer.php'); ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <script>
        function deleteConfirmCarousel(id) {
            if (confirm("Apakah Anda yakin ingin menghapus data carousel ini?")) {
                window.location.href = "menuadmin.php?id=" + id + "&type=carousel";
            }
        }

        function deleteConfirmArtikel(id) {
            if (confirm("Apakah Anda yakin ingin menghapus data artikel ini?")) {
                window.location.href = "menuadmin.php?id=" + id + "&type=artikel";
            }
        }

        function deleteConfirmVidio(id) {
            if (confirm("Apakah Anda yakin ingin menghapus data vidio ini?")) {
                window.location.href = "menuadmin.php?id=" + id + "&type=vidio";
            }
        }
    </script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>