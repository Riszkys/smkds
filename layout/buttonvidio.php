<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalVidio">
    Tambah Data Vidio
</button>

<!-- Modal -->
<div class="modal fade " id="modalVidio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Vidio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="menuadmin.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 py-2">
                            <label for="video">Upload video:</label>
                            <input type="file" name="video" id="video" required>
                        </div>
                        <div class="col-12 py-2">
                            <label for="thumbnail">Upload Thumbnail video:</label>
                            <input type="file" name="thumbnail" id="thumbnail" required>
                        </div>
                        <div class="col-12 py-2">
                            <label for="judul_video">Judul video:</label>
                            <input type="text" name="judul_video" id="judul_video" required>
                        </div>
                        <div class="col-12 py-2">
                            <label for="keterangan">Keterangan:</label>
                            <textarea name="keterangan" id="keterangan" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submitForm3">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>