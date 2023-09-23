<?php
$artikels = getArtikel();
?>
<div class="row py-1">
    <?php
    function truncateText($text, $maxLength)
    {
        if (strlen($text) > $maxLength) {
            $text = substr($text, 0, $maxLength);
            $text = substr($text, 0, strrpos($text, ' ')) . '...';
        }
        return $text;
    }

    foreach ($artikels as $artikel) :
    ?>
    <a class="col-6 col-lg-4 wow fadeInUp" data-bs-toggle="modal"
        data-bs-target="#modalTampilVidio<?= $artikel['id']; ?>">
        <?= card($artikel['foto'], truncateText($artikel['judul'], 20), truncateText($artikel['keterangan'], 60)); ?>
    </a>

    <!-- Modal -->
    <div class="modal fade" id="modalTampilVidio<?= $artikel['id']; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="overflow-hidden">
                        <img width="100%" src="./assets/artikel/<?= $artikel['foto']; ?>" alt="">
                        <h5 class="py-2"><?= $artikel['judul']; ?></h5>
                        <p class="py-2"><?= $artikel['keterangan']; ?>
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    endforeach;
    ?>

</div>