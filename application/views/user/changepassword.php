<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header">
                    <div class="h4 mb-0 font-weight-bold text-dark text-center"><?= $title; ?></div>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata("message"); ?>
                    <form action="<?= base_url("user/changepassword"); ?>" method="POST">
                        <div class="form-group">
                            <label for="current_password" class="font-weight-bold text-dark">Password Lama</label>
                            <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Masukan Password Lama...">
                            <?= form_error("current_password", '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="new_password1" class="font-weight-bold text-dark">Password Baru</label>
                            <input type="password" name="new_password1" id="new_password1" class="form-control" placeholder="Masukan Password Baru...">
                            <?= form_error("new_password1", '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="new_password2" class="font-weight-bold text-dark">Konfirmasi Password</label>
                            <input type="password" name="new_password2" id="new_password2" class="form-control" placeholder="Konfirmasi Password">
                            <?= form_error("new_password2", '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>