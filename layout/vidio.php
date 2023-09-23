<?php
$videos = getVidio();
?>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">
                Video
            </h6>
            <h1 class="mb-5">Video terkini</h1>
        </div>
        <div class="row g-4">
            <?php foreach ($videos as $video) : ?>
                <a class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" data-bs-toggle="modal" data-bs-target="#modalTampilVidio<?= $video['id']; ?>">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img src="./assets/vidio/thumbnail/<?= $video['thumbnail']; ?>" alt="Video Thumbnail" width="100%">
                        </div>

                        <div class="text-center p-2">
                            <h5 class="mb-1"><?= $video['judul_video']; ?></h5>
                            <small><?= $video['keterangan'];  ?></small>
                        </div>
                    </div>
                </a>

                <!-- Modal -->
                <div class="modal fade" id="modalTampilVidio<?= $video['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?= $video['judul_video']; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="stopVideo('videoPlayer<?= $video['id']; ?>')"></button>
                            </div>
                            <div class="modal-body">
                                <div class="overflow-hidden">
                                    <video id="videoPlayer<?= $video['id']; ?>" width="100%" controls poster="./assets/vidio/thumbnail/<?= $video['thumbnail']; ?>">
                                        <source src="./assets/vidio/<?= $video['video']; ?>" type="video/mp4">
                                    </video>
                                    <p class=""><?= $video['keterangan']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="stopVideo('videoPlayer<?= $video['id']; ?>')">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>
        </div>
    </div>
</div>