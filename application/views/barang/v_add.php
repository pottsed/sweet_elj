<div class="col-sm-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Barang</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            //notifikasi gagal upload
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-info"></i>' . $error_upload . '</h5></div>';
            }

            echo form_open_multipart('barang/add') ?>

            <div class="form-group">
                <label>Nama Barang</label>
                <input name="nama_barang" class="form-control" placeholder="Nama barang" value="<?= set_value('nama_barang'); ?>">
                <?php echo form_error('nama_barang', '<div class="text-danger small ml-2">', '</div>') ?>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" class="form-control">
                            <option value="">--Pilih Kategori--</option>
                            <?php foreach ($kategori as $key => $value) { ?>
                                <option value="<?= $value->id_kategori; ?>"><?= $value->nama_kategori; ?></option>
                            <?php } ?>
                        </select>
                        <?php echo form_error('id_kategori', '<div class="text-danger small ml-2">', '</div>') ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Harga Barang</label>
                        <input name="harga" class="form-control" placeholder="Harga barang" value="<?= set_value('harga'); ?>">
                        <?php echo form_error('harga', '<div class="text-danger small ml-2">', '</div>') ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Berat Barang</label>
                        <input name="berat" type="number" min="0" class="form-control" placeholder="Berat barang (g)" value="<?= set_value('berat'); ?>">
                        <?php echo form_error('berat', '<div class="text-danger small ml-2">', '</div>') ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="5" placeholder="Deskripsi Barang"><?= set_value('deskripsi'); ?></textarea>
                <?php echo form_error('deskripsi', '<div class="text-danger small ml-2">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Bahan</label>
                <select name="id_bahan" class="form-control">
                    <option value="">--Pilih Bahan--</option>
                    <?php foreach ($bahan as $key => $value) { ?>
                        <option value="<?= $value->id_bahan; ?>"><?= $value->nama_bahan; ?></option>
                    <?php } ?>
                </select>
                <?php echo form_error('id_bahan', '<div class="text-danger small ml-2">', '</div>') ?>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Upload Gambar</label>
                        <input type="file" name="gambar" class="form-control" id="preview_gambar" required>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <img src="<?= base_url('assets/uploads/imgnotfound.jpg') ?>" id="gambar_load" width="300px">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success btn-m float-right">Save</button>
                <a href="<?= base_url('barang'); ?>" class="btn btn-default btn-m">Back</a>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>


<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#preview_gambar').change(function() {
        bacaGambar(this);
    })
</script>