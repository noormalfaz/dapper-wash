<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <div class="card shadow">
                <div class="card-header">
                    <h1 class="h3 mb-0 font-weight-bold text-dark text-center"><?= $title; ?></h1>
                </div>
                <div class="card card-body">
                    <form action="" method="post">
                        <div class="form-group row">
                            <input type="hidden" name="id_member" value="<?= $member['id_member']; ?>">
                            <label for="nama" class="col-sm-2 mt-0 mt-lg-2 font-weight-bold text-dark">Member</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" id="nama" class="form-control" value="<?= $member['nama']; ?>">
                                <?= form_error("nama", '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 mt-0 mt-lg-2 font-weight-bold text-dark">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $member['alamat']; ?>">
                                <?= form_error("alamat", '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nohp" class="col-sm-2 mt-0 mt-lg-2 font-weight-bold text-dark">No. Handphone</label>
                            <div class="col-sm-10">
                                <input type="text" name="nohp" id="nohp" class="form-control" value="<?= $member['nohp']; ?>">
                                <?= form_error("nohp", '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="ml-0 btn btn-primary">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>