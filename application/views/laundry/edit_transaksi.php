<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <div class="card shadow">
                <div class="card-header">
                    <h1 class="h3 mb-0 font-weight-bold text-dark text-center"><?= $title; ?></h1>
                </div>
                <div class="card card-body">
                    <form action="<?= base_url('laundry/updatetransaksi'); ?>" method="post">
                        <div class="form-group row">
                            <input type="hidden" name="id_transaksi" value="<?= $transaksi['id_transaksi']; ?>">
                            <input type="hidden" name="member" value="<?= $transaksi['member']; ?>">
                            <label for="nama" class="col-sm-2 mt-0 mt-lg-2 font-weight-bold text-dark">Konsumen</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" id="nama" class="form-control" value="<?= $transaksi['nama']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="paket" class="col-sm-2 mt-0 mt-lg-2 font-weight-bold text-dark">Paket</label>
                            <div class="col-sm-10">
                                <select name="paket" id="paket" class="form-control">
                                    <?php foreach ($paket as $p) : ?>
                                        <?php if ($p["id_paket"] == $transaksi["paket_id"]) : ?>
                                            <option value="<?= $p["id_paket"]; ?>" selected><?= $p["nama"] ?> - <?= rupiah($p["harga"]); ?></option>
                                        <?php else : ?>
                                            <option value="<?= $p["id_paket"]; ?>"><?= $p["nama"] ?> - <?= rupiah($p["harga"]); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error("paket", '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="paket" class="col-sm-2 mt-0 mt-lg-2 font-weight-bold text-dark">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="status" class="form-control">
                                    <?php foreach ($status as $s) : ?>
                                        <?php if ($s == $transaksi["status"]) : ?>
                                            <option value="<?= $s; ?>" selected>
                                                <?php if ($s == 0) : ?>
                                                    Open
                                                <?php elseif ($s == 1) : ?>
                                                    On Proses
                                                <?php elseif ($s == 2) : ?>
                                                    Closed
                                                <?php endif; ?>
                                            </option>
                                        <?php else : ?>
                                            <option value="<?= $s; ?>">
                                                <?php if ($s == 0) : ?>
                                                    Open
                                                <?php elseif ($s == 1) : ?>
                                                    On Proses
                                                <?php elseif ($s == 2) : ?>
                                                    Closed
                                                <?php endif; ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error("paket", '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="berat" class="col-sm-2 mt-0 mt-lg-2 font-weight-bold text-dark">Berat</label>
                            <div class="col-sm-10">
                                <input type="text" name="berat" id="berat" class="form-control" value="<?= $transaksi['berat']; ?>">
                                <?= form_error("berat", '<small class="text-danger">', '</small>'); ?>
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