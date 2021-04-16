<div class="col-12">
    <!-- Main content -->
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">

            <div class="col-12">
                <h4>
                    <img src="<?= base_url() ?>template/dist/img/Logoo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8" width="50px">
                    Sweet ELJ | <?= $tittle ?>
                    <small class="float-right">Tahun : <?= $tahun ?> </small><br>
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
                            <th>Tanggal</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $total_bayar = 0;
                        foreach ($laporan as $key => $value) {
                            $total_bayar = $total_bayar + $value->sub_total;
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->tgl_order ?></td>
                                <td>Rp. <?= number_format($value->sub_total, 0) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <h3 class="text-right"><b>Grand Total : Rp <?= number_format($total_bayar, 0) ?> </b></h3>
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