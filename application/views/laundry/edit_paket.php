<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header">
                    <h1 class="h3 mb-0 font-weight-bold text-dark text-center"><?= $title; ?></h1>
                </div>
                <div class="card card-body">
                    <form method="post" action="<?= base_url("paket/updatepaket");?>">
                        <div class="form-group row">
                            <input type="hidden" name="id_paket" value="<?= $paket['id_paket']; ?>">
                            <label for="nama" class="col-sm-2 mt-0 mt-lg-2 font-weight-bold text-dark">Paket</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" id="nama" class="form-control" value="<?= $paket['nama']; ?>">
                                <?= form_error("nama", '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga" class="col-sm-2 mt-0 mt-lg-2 font-weight-bold text-dark">Harga</label>
                            <div class="col-sm-10">
                                <input type="text" name="harga" id="harga" class="form-control" value="<?= $paket['harga']; ?>">
                                <?= form_error("harga", '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hari" class="col-sm-2 mt-0 mt-lg-2 font-weight-bold text-dark">Hari</label>
                            <div class="col-sm-10">
                                <input type="text" name="hari" id="hari" class="form-control" value="<?= $paket['hari']; ?>">
                                <?= form_error("hari", '<small class="text-danger">', '</small>'); ?>
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