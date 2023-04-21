<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-6 bg-gradient-info vh-100">
            <div class="row justify-content-center align-items-center text-white vh-100">
                <div class="col-lg-7 col-md-8 col-11">
                    <div class="text-center">
                        <img src="<?= base_url(); ?>assets/img/Logo.png" alt="" class="" width="200px">
                        <h3 class="mb-0">Ubah Password</h3>
                        <h5 class="font-weight-bold text-light"><?= $this->session->userdata('reset_email'); ?></h5>
                    </div>
                    <?= $this->session->flashdata("message"); ?>
                    <form class="mb-3" action="<?= base_url(); ?>auth/changepassword" method="POST">
                        <div class="form-group">
                            <label for="password1">Password</label>
                            <input type="password" class="form-control" id="password1" name="password1" placeholder="Masukan Password Baru...">
                            <?= form_error("password1", '<small class="text-warning">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password2">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password Baru...">
                            <?= form_error("password2", '<small class="text-warning">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            Ubah Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 bg-img vh-100 d-lg-block d-none"></div>
    </div>
</div>