<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCarousel">
    Tambah Data Carousel
</button>

<!-- Modal -->
<div class="modal fade " id="modalCarousel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Carousel Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="menuadmin.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 py-2">
                            <label for="foto">Upload Foto:</label>
                            <input type="file" name="foto" id="foto" required>
                        </div>
                        <div class="col-12 py-2">
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" required>
                        </div>
                        <div class="col-12 py-2">
                            <label for="keterangan">Keterangan:</label>
                            <textarea name="keterangan" id="keterangan" rows="4" required></textarea>
                        </div>

                        <button name="submitForm1" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>