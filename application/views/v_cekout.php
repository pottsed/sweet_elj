  <!-- Main content -->
  <div class="invoice p-3 mb-3">
      <!-- title row -->
      <div class="row">
          <div class="col-12">
              <h4>
                  <img src="<?= base_url() ?>template/dist/img/Logoo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8" width="50px">
                  Sweet ELJ
                  <small class="float-right">Date: <?= date('d/m/y') ?></small>
              </h4>
          </div>
          <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
              From
              <address>
                  <strong>Admin, Inc.</strong><br>
                  795 Folsom Ave, Suite 600<br>
                  San Francisco, CA 94107<br>
                  Phone: (804) 123-5432<br>
                  Email: info@almasaeedstudio.com
              </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">

          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
              <b>Invoice #007612</b><br>
              <br>
              <b>Order ID:</b> 4F3S8J<br>
              <b>Payment Due:</b> 2/22/2014<br>
              <b>Account:</b> 968-34567
          </div>
          <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
          <div class="col-12 table-responsive">
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>Qty</th>
                          <th width="150px" class="text-center">Harga</th>
                          <th>Barang</th>
                          <th class="text-center">Total Harga</th>
                          <th class="text-center">Berat</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $i = 1; ?>

                      <?php
                        $total_berat = 0;
                        foreach ($this->cart->contents() as $items) {
                            $barang = $this->m_home->detail_brg($items['id']);
                            $berat = $items['qty'] * $barang->berat;
                            $total_berat = $total_berat + $berat;
                        ?>
                          <tr>
                              <td><?php echo $items['qty']; ?></td>
                              <td class="text-center">Rp. <?php echo number_format($items['price'], 0); ?></td>
                              <td><?php echo $items['name']; ?></td>
                              <td class="text-center">Rp. <?php echo number_format($items['subtotal'], 0); ?></td>
                              <td class="text-center"><?= $berat; ?>gr</td>
                          </tr>
                      <?php } ?>
                  </tbody>
              </table>
          </div>
          <!-- /.col -->
      </div>
      <!-- /.row -->
      <?php
        echo form_open('belanja/cekout');
        $no_order = date('Ymd') . strtoupper(random_string('alnum', 8));
        ?>
      <div class="row">
          <!-- accepted payments column -->
          <div class="col-sm-8 invoice-col">
              Tujuan :
              <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label>Provinsi</label>
                          <select name="provinsi" class="form-control"></select>
                          <?php echo form_error('provinsi', '<div class="text-danger small ml-2">', '</div>') ?>
                      </div>
                  </div>

                  <div class="col-sm-6">
                      <div class="form-group">
                          <label>Kota/Kabupaten</label>
                          <select name="kota" class="form-control"></select>
                          <?php echo form_error('kota', '<div class="text-danger small ml-2">', '</div>') ?>
                      </div>
                  </div>

                  <div class="col-sm-6">
                      <div class="form-group">
                          <label>Expedisi</label>
                          <select name="expedisi" class="form-control"></select>
                          <?php echo form_error('expedisi', '<div class="text-danger small ml-2">', '</div>') ?>
                      </div>
                  </div>

                  <div class="col-sm-6">
                      <div class="form-group">
                          <label>Paket</label>
                          <select name="paket" class="form-control"></select>
                          <?php echo form_error('paket', '<div class="text-danger small ml-2">', '</div>') ?>
                      </div>
                  </div>

                  <div class="col-sm-8">
                      <div class="form-group">
                          <label>Alamat</label>
                          <input type="text" name="alamat" class="form-control" required>
                      </div>
                  </div>

                  <div class="col-sm-4">
                      <div class="form-group">
                          <label>Kode Pos</label>
                          <input type="text" name="kode_pos" class="form-control" required>
                      </div>
                  </div>

                  <div class="col-sm-6">
                      <div class="form-group">
                          <label>Nama Penerima</label>
                          <input type="text" name="nama_penerima" class="form-control" required>
                      </div>
                  </div>

                  <div class="col-sm-6">
                      <div class="form-group">
                          <label>No. Hp Penerima</label>
                          <input type="text" name="tlp_penerima" class="form-control" required>
                      </div>
                  </div>

              </div>
          </div>
          <!-- /.col -->
          <div class="col-4">

              <div class="table-responsive">
                  <table class="table">
                      <tr>
                          <th style="width:50%">Subtotal :</th>
                          <td>Rp. <?php echo number_format($this->cart->total(), 0); ?></td>
                      </tr>
                      <tr>
                          <th>Berat :</th>
                          <td><?= $total_berat; ?> gr</td>
                      </tr>
                      <tr>
                          <th>Ongkir :</th>
                          <td id="ongkir"></td>
                      </tr>
                      <tr>
                          <th>Total Bayar :</th>
                          <td><label id="total_bayar"></label></td>
                      </tr>
                  </table>
              </div>
          </div>
          <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- simpan transaksi -->
      <input name="no_order" value="<?= $no_order ?>" hidden>
      <input name="estimasi" hidden>
      <input name="ongkir" hidden>
      <input name="berat" value="<?= $total_berat ?>" hidden><br>
      <input name="sub_total" value="<?= $this->cart->total() ?>" hidden>
      <input name="total_bayar" hidden>
      <!-- simpan transaksi -->

      <!-- simpan rinci transaksi -->
      <?php
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            echo form_hidden('qty' . $i++, $items['qty']);
        }
        ?>
      <!-- simpan rinci transaksi -->
      <div class="row no-print">
          <div class="col-12">
              <a href="<?= base_url('belanja'); ?>" class="btn btn-default"><i class="fas fa-arrow-left"></i> Back</a>
              <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Check Out</button>
          </div>
      </div>
      <?php echo form_close() ?>
  </div>
  <!-- /.invoice -->


  <script>
      $(document).ready(function() {
          //memasukan data select ke provinsi
          $.ajax({
              type: "POST",
              url: "<?= base_url('rajaongkir/provinsi') ?>",
              success: function(hasil_provinsi) {
                  //console.log(hasil_provinsi)
                  $("select[name=provinsi]").html(hasil_provinsi);
              }
          });
          //memasukan data select ke kota
          $("select[name=provinsi]").on("change", function() {
              var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
              $.ajax({
                  type: "POST",
                  url: "<?= base_url('rajaongkir/kota'); ?>",
                  data: 'id_provinsi=' + id_provinsi_terpilih,
                  success: function(hasil_kota) {
                      // console.log(hasil_kota)
                      $("select[name=kota]").html(hasil_kota);
                  }
              });
          });
          //data ekspedisi
          $("select[name=kota]").on("change", function() {
              $.ajax({
                  type: "POST",
                  url: "<?= base_url('rajaongkir/expedisi'); ?>",
                  success: function(hasil_expedisi) {
                      // console.log(hasil_kota)
                      $("select[name=expedisi]").html(hasil_expedisi);
                  }
              });
          });
          //data paket
          $("select[name=expedisi]").on("change", function() {
              //mendpt ekspedisi terpilih
              var expedisi_terpilih = $("select[name=expedisi]").val()
              //id kota tujuan
              var id_kota_tujuan = $("option:selected", "select[name=kota]").attr('id_kota');
              //data berat
              var total_berat = <?= $total_berat; ?>;
              //alert(total_berat);
              $.ajax({
                  type: "POST",
                  url: "<?= base_url('rajaongkir/paket'); ?>",
                  data: 'expedisi=' + expedisi_terpilih + '&id_kota=' + id_kota_tujuan + '&berat=' + total_berat,
                  success: function(hasil_paket) {
                      //console.log(hasil_paket)
                      $("select[name=paket]").html(hasil_paket);
                  }
              });
          });

          //hrg paket
          $("select[name=paket]").on("change", function() {
              //menampilkan ongkir
              var dataongkir = $("option:selected", this).attr('ongkir');
              var reverse = dataongkir.toString().split('').reverse().join(''),
                  ribuan_ongkir = reverse.match(/\d{1,3}/g);
              ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');
              //   alert(dataongkir);
              $("#ongkir").html("Rp. " + ribuan_ongkir);
              //menghitung total bayar
              var ongkir = $("option:selected", this).attr('ongkir');
              var total_bayar = parseInt(ongkir) + parseInt(<?= $this->cart->total() ?>);
              var reverse2 = total_bayar.toString().split('').reverse().join(''),
                  ribuan_total_bayar = reverse2.match(/\d{1,3}/g);
              ribuan_total_bayar = ribuan_total_bayar.join(',').split('').reverse().join('');
              $("#total_bayar").html("Rp. " + ribuan_total_bayar);

              //estimasi dan ongkir
              var estimasi = $("option:selected", this).attr('estimasi');
              $("input[name=estimasi]").val(estimasi);
              $("input[name=ongkir]").val(dataongkir);
              $("input[name=total_bayar]").val(total_bayar);
          });



      });
  </script>