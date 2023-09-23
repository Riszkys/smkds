<?php

function getUser($username)
{
    require('koneksi.php');
    $query = "SELECT * FROM user where username='$username'";
    $res = $conn->query($query);
    return $res->fetch_assoc();
}

function getSlider()
{
    require('koneksi.php');
    $query = "SELECT * FROM banner_slider";
    $res = $conn->query($query);
    $data = array();

    while ($row = $res->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}
function getArtikel()
{
    require('koneksi.php');
    $query = "SELECT * FROM artikel";
    $res = $conn->query($query);
    $data = array();

    while ($row = $res->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}
function getVidio()
{
    require('koneksi.php');
    $query = "SELECT * FROM video";
    $res = $conn->query($query);
    $data = array();

    while ($row = $res->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function updateVideo($id, $judul, $video, $thumbnail, $keterangan)
{
    require('koneksi.php');

    // Dapatkan nama video dan thumbnail lama sebelum update
    $getOldDataQuery = "SELECT video, thumbnail FROM video WHERE id = '$id'";
    $result = $conn->query($getOldDataQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $oldVideoName = $row['video'];
        $oldThumbnailName = $row['thumbnail'];

        // Hapus video lama dari direktori
        $oldVideoPath = './assets/vidio/' . $oldVideoName;
        if (file_exists($oldVideoPath)) {
            unlink($oldVideoPath);
        }

        // Hapus thumbnail lama dari direktori
        $oldThumbnailPath = './assets/vidio/thumbnail/' . $oldThumbnailName;
        if (file_exists($oldThumbnailPath)) {
            unlink($oldThumbnailPath);
        }

        // Menangani data video baru
        $videoTargetDir = './assets/vidio/';
        $newVideoFileName = uniqid() . '_' . basename($video['name']);
        $videoTargetPath = $videoTargetDir . $newVideoFileName;

        // Menangani data thumbnail baru
        $thumbnailTargetDir = './assets/vidio/thumbnail/';
        $newThumbnailFileName = uniqid() . '_' . basename($thumbnail['name']);
        $thumbnailTargetPath = $thumbnailTargetDir . $newThumbnailFileName;

        if (move_uploaded_file($video['tmp_name'], $videoTargetPath) && move_uploaded_file($thumbnail['tmp_name'], $thumbnailTargetPath)) {
            $newVideoFileName = mysqli_real_escape_string($conn, $newVideoFileName);
            $newThumbnailFileName = mysqli_real_escape_string($conn, $newThumbnailFileName);
            $judul = mysqli_real_escape_string($conn, $judul);
            $keterangan = mysqli_real_escape_string($conn, $keterangan);

            $query = "UPDATE video SET judul_video='$judul', video='$newVideoFileName', thumbnail='$newThumbnailFileName', keterangan='$keterangan' WHERE id='$id'";
            if ($conn->query($query)) {
                return true;
            } else {
                echo 'Error in query: ' . $conn->error;
            }
        } else {
            echo 'Failed to upload files.';
        }
    } else {
        echo 'No data found.';
    }

    return false;
}


function updateSlider($id, $judul, $foto, $keterangan)
{
    require('koneksi.php');

    // Dapatkan nama gambar lama sebelum update
    $getOldImageQuery = "SELECT foto FROM banner_slider WHERE id = '$id'";
    $result = $conn->query($getOldImageQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $oldImageName = $row['foto'];

        // Hapus gambar lama dari direktori
        $oldImagePath = './assets/carousel/' . $oldImageName;
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }

        // Menangani data gambar baru
        $targetDir = './assets/carousel/';
        $newFileName = uniqid() . '_' . basename($foto['name']);
        $targetPath = $targetDir . $newFileName;

        if (move_uploaded_file($foto['tmp_name'], $targetPath)) {
            $query = "UPDATE banner_slider SET title='$judul', foto='$newFileName', keterangan='$keterangan' WHERE id='$id'";
            if ($conn->query($query)) {
                return true;
            } else {
                echo 'Error in query: ' . $conn->error;
            }
        } else {
            echo 'Failed to upload image.';
        }
    } else {
        echo 'No data found.';
    }

    return false;
}

function updateArtikel($id, $judul, $foto, $keterangan)
{
    require('koneksi.php');

    // Dapatkan nama gambar lama sebelum update
    $getOldImageQuery = "SELECT foto FROM artikel WHERE id = '$id'";

    $result = $conn->query($getOldImageQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $oldImageName = $row['foto'];

        // Hapus gambar lama dari direktori
        $oldImagePath = './assets/artikel/' . $oldImageName;
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }

        // Menangani data gambar baru
        $targetDir = './assets/artikel/';
        $newFileName = uniqid() . '_' . basename($foto['name']);
        $targetPath = $targetDir . $newFileName;

        if (move_uploaded_file($foto['tmp_name'], $targetPath)) {
            $query = "UPDATE artikel SET judul='$judul', foto='$newFileName', keterangan='$keterangan' WHERE id='$id'";
            if ($conn->query($query)) {
                return true;
            } else {
                echo 'Error in query: ' . $conn->error;
            }
        } else {
            echo 'Failed to upload image.';
        }
    } else {
        echo 'No data found. id : ' . $id . '';
    }

    return false;
}



function deleteSlider($id)
{
    require('koneksi.php');

    // Dapatkan nama gambar sebelum menghapus
    $query = "SELECT foto FROM banner_slider WHERE id = '$id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imageName = $row['foto'];

        // Hapus data dari tabel
        $deleteQuery = "DELETE FROM banner_slider WHERE id = '$id'";
        if ($conn->query($deleteQuery)) {
            // Hapus gambar dari direktori
            unlink('assets/carousel/' . $imageName);
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function deleteArtikel($id)
{
    require('koneksi.php');

    // Dapatkan nama gambar sebelum menghapus
    $query = "SELECT foto FROM artikel WHERE id = '$id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imageName = $row['foto'];

        // Hapus data dari tabel
        $deleteQuery = "DELETE FROM artikel WHERE id = '$id'";
        if ($conn->query($deleteQuery)) {
            // Hapus gambar dari direktori
            unlink('./assets/artikel/' . $imageName);
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function deleteVideo($id)
{
    require('koneksi.php');

    // Dapatkan nama video dan thumbnail sebelum menghapus
    $query = "SELECT video, thumbnail FROM video WHERE id = '$id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $videoName = $row['video'];
        $thumbnailName = $row['thumbnail'];

        // Hapus data dari tabel
        $deleteQuery = "DELETE FROM video WHERE id = '$id'";
        if ($conn->query($deleteQuery)) {
            // Hapus video dari direktori
            unlink('./assets/vidio/' . $videoName);

            // Hapus thumbnail dari direktori
            unlink('./assets/vidio/thumbnail/' . $thumbnailName);

            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


function card($urlimage, $title = 'unknown', $description = 'unknown')
{
    $card = '<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="./assets/artikel/' . $urlimage . '" class="img-fluid rounded-start cover-image"
alt="' . $urlimage . '">
</div>
<div class="col-md-8">
    <div class="card-body">
        <h5 class="card-title">' . $title . '</h5>
        <p class="card-text">' . $description . '</p>
    </div>
</div>
</div>
</div>
';
    return $card;
}



function compressAndResizeImage($imagePath, $newWidth, $newHeight)
{
    $sourceImage = imagecreatefromjpeg($imagePath);
    $compressedImage = imagecreatetruecolor($newWidth, $newHeight);

    imagecopyresampled($compressedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, imagesx($sourceImage), imagesy($sourceImage));

    return $compressedImage;
}