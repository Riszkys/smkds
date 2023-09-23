<?php
$artikels = getArtikel();
?>

<h4>Data Carousel</h4>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Foto</th>
        <th>judul</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>
    <?php if (!empty($artikels)) : ?>
        <?php foreach ($artikels as $artikel) : ?>
            <tr>
                <td><?= $artikel['id']; ?></td>
                <td><img src="./assets/artikel/<?= $artikel['foto']; ?>" alt="<?= $artikel['foto']; ?>" width="50"></td>
                <td><?= $artikel['judul']; ?></td>
                <td><?= $artikel['keterangan']; ?></td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modaleditArtikel<?= $artikel['id'] ?>">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteConfirmArtikel(<?= $artikel['id']; ?>)">hapus</button>
                    <!-- Modal -->
                    <div class="modal fade " id="modaleditArtikel<?= $artikel['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Upload Carousel Image
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="menuadmin.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-12 py-2">
                                                <input type="hidden" name="id" id="id" value="<?= $artikel['id']; ?>">
                                                <label for="foto">Upload Foto:</label>
                                                <input type="file" name="foto" id="foto" required>
                                            </div>
                                            <div class="col-12 py-2">
                                                <label for="title">Title:</label>
                                                <input type="text" name="judul" id="judul" value="<?= $artikel['judul']; ?>" required>
                                            </div>
                                            <div class="col-12 py-2">
                                                <label for="keterangan">Keterangan:</label>
                                                <textarea name="keterangan" id="keterangan" rows="4" required><?= $artikel['keterangan']; ?></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary" name="gantiArtikel">Submit</button>
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
            <td colspan="5" class="text-center">Tidak ada data artikel yang tersedia.</td>
        </tr>
    <?php endif; ?>

</table>