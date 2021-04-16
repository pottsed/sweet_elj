<div class="col-12">
    <!-- Main content -->
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">

            <div class="col-12">
                <h4>
                    <img src="<?= base_url() ?>template/dist/img/Logoo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8" width="50px">
                    Sweet ELJ | Laporan Penjualan Harian
                    <small class="float-right">Tanggal : <?= $tanggal ?>/<?= $bulan ?>/<?= $tahun ?> </small><br>
                </h4>
            </div>
            <!-- /.col -->
        </div>


        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Transaksi</th>
                            <th>Barang</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sub_total = 0;
                        foreach ($laporan as $key => $value) {
                            $total_harga = $value->qty * $value->harga;
                            $sub_total = $sub_total + $total_harga;
                        ?>

                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->nama_barang ?></td>
                                <td>Rp. <?= number_format($value->harga, 0) ?></td>
                                <td><?= $value->qty ?></td>
                                <td>Rp. <?= number_format($total_harga, 0) ?></td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
                <h3 class="text-right"><b> Grand Total : Rp. <?= number_format($sub_total, 0) ?></b></h3>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">
                <button class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
            </div>
        </div>
    </div>
    <!-- /.invoice -->
</div><!-- /.col -->
</div><!-- /.row -->


<br>
<br>
<br>
<br>