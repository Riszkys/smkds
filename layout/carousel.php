<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative">
        <?php
        $sliders = getSlider();

        foreach ($sliders as $slider) :
        ?>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="assets/carousel/<?= $slider['foto']; ?>" alt="<?= $slider['title']; ?>" width="200px" />
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, 0.7)">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">
                                    <?= $slider['title']; ?>
                                </h5>
                                <h1 class="display-3 text-white animated slideInDown"></h1>
                                <p class="fs-5 text-white mb-4 pb-2">
                                    <?= $slider['keterangan']; ?>
                                </p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Carousel End -->