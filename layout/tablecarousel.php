<?php
$sliders = getSlider();
?>

<h4>Data Carousel</h4>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Foto</th>
        <th>Title</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>
    <?php if (!empty($sliders)) : ?>
    <?php foreach ($sliders as $slider) : ?>
    <tr>
        <td><?= $slider['id']; ?></td>
        <td><img src="./assets/carousel/<?= $slider['foto']; ?>" alt="<?= $slider['foto']; ?>" width="50"></td>
        <td><?= $slider['title']; ?></td>
        <td><?= $slider['keterangan']; ?></td>
        <td>
            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                data-bs-target="#modaleditCarousel<?= $slider['id'] ?>">Edit</button>
            <button type="button" class="btn btn-danger btn-sm"
                onclick="deleteConfirmCarousel(<?= $slider['id']; ?>)">hapus</button>

            <!-- Modal -->
            <div class="modal fade " id="modaleditCarousel<?= $slider['id'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <input type="hidden" name="id" id="id" value="<?= $slider['id']; ?>">
                                    <div class="col-12 py-2">
                                        <label for="foto">Upload Foto:</label>
                                        <input type="file" name="foto" id="foto" required>
                                    </div>
                                    <div class="col-12 py-2">
                                        <label for="title">Title:</label>
                                        <input type="text" name="title" id="title" value="<?= $slider['title']; ?>"
                                            required>
                                    </div>
                                    <div class="col-12 py-2">
                                        <label for="keterangan">Keterangan:</label>
                                        <textarea name="keterangan" id="keterangan" rows="4"
                                            required><?= $slider['keterangan']; ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="gantiCarousel">Submit</button>
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
        <td colspan="5" class="text-center">Tidak ada data slider yang tersedia.</td>
    </tr>
    <?php endif; ?>

</table>