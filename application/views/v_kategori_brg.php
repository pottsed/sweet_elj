<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?= base_url() ?>assets/slider/bg1.jpg">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url() ?>assets/slider/bg2.jpg">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url() ?>assets/slider/bg4.jpeg">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url() ?>assets/slider/bg3.jpg">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-custom-icon" aria-hidden="true">
            <i class="fas fa-chevron-left"></i>
        </span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-custom-icon" aria-hidden="true">
            <i class="fas fa-chevron-right"></i>
        </span>
        <span class="sr-only">Next</span>
    </a>
</div>


<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row ">
            <?php foreach ($barang as $key => $value) { ?>
                <div class="col-sm-4">
                    <div class="card bg-light">
                        <div class="col-12 text-center">
                            <img src="<?= base_url('assets/uploads/' . $value->gambar) ?>" alt="user-avatar" width="300px" height="250px">
                        </div>
                        <div class="card-header text-muted border-bottom-0">
                            <h2 class="lead"><b><?= $value->nama_barang; ?></b></h2>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">

                                    <p class="text-muted text-sm"><b>Kategori : </b> <?= $value->nama_kategori; ?> </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="medium"><span class="fa-li "><i class="fas fa-wallet"></i></span><span class="badge bg-success bg-m">Rp. <?= number_format($value->harga, 0); ?></span></li>
                                        <li class="medium"><span class="fa-li"><i class="fas fa-layer-group"></i></span><?= $value->nama_bahan; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fa fa-cart-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>
</div>