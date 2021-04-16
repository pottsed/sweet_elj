<div class="card card-solid">
    <div class="card-body pb-0">

        <div class="row">
            <div class="col-7">
                <h2 class="lead"><b><?= $this->session->userdata('nama_pelanggan'); ?></b></h2>
                <p class="text-muted text-sm"><b>Email : </b> <?= $this->session->userdata('email'); ?> </p>
                <ul class="ml-4 mb-0 fa-ul text-muted">
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                </ul>
            </div>
            <div class="col-5 text-center">
                <img src="<?= base_url('assets/foto/' . $this->session->userdata('foto')) ?>" width="250px" height="250px">
            </div>
        </div>
    </div>
    <div class=" card-footer">
        <div class="text-right">
            <a href="#" class="btn btn-sm bg-teal">
                <i class="fas fa-comments"></i>
            </a>
            <a href="#" class="btn btn-sm btn-primary">
                <i class="fas fa-user"></i> View Profile
            </a>
        </div>

    </div>
</div>




<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>