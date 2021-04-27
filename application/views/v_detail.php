<div class="card card-solid">
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-sm-6">
        <h3 class="d-inline-block d-sm-none"><?= $barang->nama_barang; ?></h3>
        <div class="col-12">
          <img src="<?= base_url('assets/uploads/' . $barang->gambar) ?>" class="product-image" alt="Product Image">
        </div>
        <div class="col-12 product-image-thumbs">
          <div class="product-image-thumb active"><img src="<?= base_url('assets/uploads/' . $barang->gambar) ?>" alt="Product Image"></div>
          <?php foreach ($gambar as $key => $value) { ?>
            <div class="product-image-thumb"><img src="<?= base_url('assets/gmr_brg/' . $value->gambar) ?>" alt="Product Image"></div>
          <?php } ?>
        </div>
      </div>
      <div class="col-12 col-sm-6">
        <h3 class="my-3"><?= $barang->nama_barang; ?></h3>
        <hr>
        <h5>Kategori : <?= $barang->nama_kategori; ?></h5>
        <h5>Bahan : <?= $barang->nama_bahan; ?></h5>
        <h5>Stok : <?= $barang->stok; ?></h5>
        <!-- <p><?= $barang->deskripsi; ?></p> -->
        <hr>
        <div class="bg-gray py-2 px-3 mt-4">
          <h2 class="mb-0">
            Rp. <?= number_format($barang->harga, 0); ?>
          </h2>
        </div>
        <hr>
        <?php
        echo form_open('belanja/add');
        echo form_hidden('id', $barang->id_barang);
        echo form_hidden('price', $barang->harga);
        echo form_hidden('name', $barang->nama_barang);
        echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
        ?>
        <div class="mt-4">
          <div class="row">
            <div class="col-sm-2">
              <input type="number" name="qty" class="form-control" value="1" min="1">
            </div>
            <div class="col-sm-8">
              <button type="submit" class="btn btn-primary btn-flat swalDefaultSuccess">
                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                Add to Cart
              </button>
            </div>
          </div>
        </div>

        <?php echo form_close(); ?>

        <div class="mt-4 product-share">
          <a href="#" class="text-gray">
            <i class="fab fa-facebook-square fa-2x"></i>
          </a>
          <a href="#" class="text-gray">
            <i class="fab fa-twitter-square fa-2x"></i>
          </a>
          <a href="#" class="text-gray">
            <i class="fas fa-envelope-square fa-2x"></i>
          </a>
          <a href="#" class="text-gray">
            <i class="fas fa-rss-square fa-2x"></i>
          </a>
        </div>

      </div>
    </div>
    <div class="row mt-4">
      <nav class="w-100">
        <div class="nav nav-tabs" id="product-tab" role="tablist">
          <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
          <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
        </div>
      </nav>
      <div class="col-lg-12">
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> 
            <?= $barang->deskripsi; ?> 
          </div>
          <div class="tab-pane fade " id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
            <div class="col-lg-12 row">

              <div class="col-lg-6 col-xs-12 border-bottom pb-2">
                <strong>Jamal</strong><br>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <br>
                <p>deskripsi</p>
              </div>
              <div class="col-lg-6 col-xs-12 border-bottom pb-2">
                <div class="col-lg-12  p-3" id="komentar">
                  <h3>Komentar</h3>
                  <form class="row" method="POST" action="<?php echo base_url()."home/comment/".$barang->id_barang ?>">
                    <?php 
                    echo form_hidden('id', $barang->id_barang);
                    ?>
                    <div class="col-md-12 form-group">
                      <label>Nama</label>
                      <input type="text" name="user" placeholder="Komentator" class="form-control" required value="<?php echo @$this->session->userdata('nama_pelanggan') ?>" <?php echo strlen($this->session->userdata('nama_pelanggan'))>0 ? "readonly" : "" ?>>
                    </div>
                    <div class="col-md-12 form-group">
                      <label>Komentar</label>
                      <textarea class="form-control" name="komentar" placeholder="Komentar" required></textarea>
                    </div>
                    <div class="col-md-12 form-group">
                      <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<script src="<?= base_url() ?>template/dist/js/demo.js"></script>
<script src="<?= base_url(); ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
 $(function() {
   var Toast = Swal.mixin({
     toast: true,
     position: 'top-end',
     showConfirmButton: false,
     timer: 3000
   });

   $('.swalDefaultSuccess').click(function() {
     Toast.fire({
       icon: 'success',
       title: 'Tas Berhasil Ditambahkan ke Keranjang !'
     })
   });
 });
</script>