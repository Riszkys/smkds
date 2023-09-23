<?php
$videos = getVidio();
?>

<h4>Data Carousel</h4>
<table class="table">
    <tr>
        <th>ID</th>
        <th>video</th>
        <th>Title</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>
    <?php if (!empty($videos)) : ?>
    <?php foreach ($videos as $video) : ?>
    <tr>
        <td><?= $video['id']; ?></td>
        <td>
            <video width="150" controls poster="./assets/vidio/thumbnail/<?= $video['thumbnail']; ?>">
                <source src="./assets/vidio/<?= $video['video']; ?>" type="video/mp4">
            </video>
        </td>

        <td><?= $video['judul_video']; ?></td>
        <td><?= $video['keterangan']; ?></td>
        <td>
            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                data-bs-target="#modaleditVidio<?= $video['id'] ?>">Edit</button>
            <button type="button" class="btn btn-danger btn-sm"
                onclick="deleteConfirmVidio(<?= $video['id']; ?>)">hapus</button>

            <!-- Modal -->
            <div class="modal fade " id="modaleditVidio<?= $video['id'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload vidio
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="menuadmin.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" name="id" id="id" value="<?= $video['id']; ?>">
                                    <div class="col-12 py-2">
                                        <label for="video">Upload video:</label>
                                        <input type="file" name="video" id="video" required>
                                    </div>
                                    <div class="col-12 py-2">
                                        <label for="thumbnail">Upload Thumbnail vidio:</label>
                                        <input type="file" name="thumbnail" id="thumbnail" required>
                                    </div>
                                    <div class="col-12 py-2">
                                        <label for="judul_video">judul video:</label>
                                        <input type="text" name="judul_video" id="judul_video"
                                            value="<?= $video['judul_video']; ?>" required>
                                    </div>
                                    <div class="col-12 py-2">
                                        <label for="keterangan">Keterangan:</label>
                                        <textarea name="keterangan" id="keterangan" rows="4"
                                            required><?= $video['keterangan']; ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="gantiVidio">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal end -->
        </td>
    </tr>
    <?php endforeach; ?>
    <?php else : ?>
    <tr>
        <td colspan="5" class="text-center">Tidak ada data video yang tersedia.</td>
    </tr>
    <?php endif; ?>

</table>