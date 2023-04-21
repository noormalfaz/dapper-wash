<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h1 class="h3 mb-0 font-weight-bold text-dark text-center"><?= $title; ?></h1>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#pilihstatus">
                        <i class="fas fa-fw fa-plus mr-1"></i>Tambah Transaksi
                    </button>
                    <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#cetak">
                        <i class="fas fa-fw fa-print mr-1"></i>Cetak Laporan
                    </button>
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" transaksi="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal Masuk</th>
                                    <th scope="col">Kode Transaksi</th>
                                    <th scope="col">Konsumen</th>
                                    <th scope="col">Paket</th>
                                    <th scope="col">Berat (KG)</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Tanggal Ambil</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($transaksi as $t) : ?>
                                    <tr>
                                        <td scope="row"><?= $no++; ?></td>
                                        <td scope="row"><?= $t["tgl_masuk"]; ?></td>
                                        <td scope="row"><?= $t["kode"]; ?></td>
                                        <td scope="row"><?= $t["nama"]; ?></td>
                                        <?php $data = $this->db->get_where('paket', ['id_paket' => $t["paket_id"]])->row_array(); ?>
                                        <td scope="row"><?= $data["nama"]; ?></td>
                                        <td scope="row"><?= $t["berat"]; ?></td>
                                        <td scope="row"><?= rupiah($t["total"]); ?></td>
                                        <td scope="row"><?= $t["tgl_ambil"]; ?></td>
                                        <td scope="row">
                                            <?php if ($t["status"] == 0) : ?>
                                                <div class="btn btn-warning">Open</div>
                                            <?php elseif ($t["status"] == 1) : ?>
                                                <div class="btn btn-success">On Proses</div>
                                            <?php elseif ($t["status"] == 2) : ?>
                                                <div class="btn btn-danger">Closed</div>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($t["status"] == 0) : ?>
                                                <a href="<?= base_url('laundry/edittransaksi/') . $t['id_transaksi']; ?>" class="btn btn-success">Edit</a>
                                                <a href="<?= base_url('laundry/detailtransaksi/') . $t['id_transaksi']; ?>" class="btn btn-warning">Detail</a>
                                            <?php elseif ($t["status"] == 1) : ?>
                                                <a href="<?= base_url('laundry/edittransaksi/') . $t['id_transaksi']; ?>" class="btn btn-success">Edit</a>
                                                <a href="<?= base_url('laundry/detailtransaksi/') . $t['id_transaksi']; ?>" class="btn btn-warning">Detail</a>
                                            <?php elseif ($t["status"] == 2) : ?>
                                                <a href="<?= base_url('laundry/detailtransaksi/') . $t['id_transaksi']; ?>" class="btn btn-warning">Detail</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->
<div class="modal fade" id="pilihstatus" tabindex="-1" role="dialog" aria-labelledby="menuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-light">
                <h5 class="modal-title" id="menuLabel"><strong>Pilih Transaksi Member</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-primary mb-3 btn-block" data-toggle="modal" data-target="#add">
                    Non Member
                </button>
                <button type="button" class="btn btn-primary mb-3 btn-block" data-toggle="modal" data-target="#addmember">
                    Member
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="menuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-light">
                <h5 class="modal-title" id="menuLabel"><strong>Tambah Transaksi Non Member</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('laundry/transaksi'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="kode" id="kode" class="form-control" value="<?= $kode; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" name="pelanggan" id="pelanggan" class="form-control" placeholder="Masukan Nama">
                    </div>
                    <div class="form-group">
                        <select name="paket" id="paket" class="form-control">
                            <option value="">Pilihan Paket</option>
                            <?php foreach ($paket as $p) : ?>
                                <option value="<?= $p["id_paket"]; ?>"><?= $p["nama"]; ?> - <?= rupiah($p["harga"]); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="berat" id="berat" class="form-control" placeholder="Masukan Berat">
                        <input type="hidden" name="member" value="Non Member">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addmember" tabindex="-1" role="dialog" aria-labelledby="menuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-light">
                <h5 class="modal-title" id="menuLabel"><strong>Tambah Transaksi Member</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('laundry/transaksi'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="kode" id="kode" class="form-control" value="<?= $kode; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <select name="pelanggan" id="pelanggan" class="form-control">
                            <option value="">Pilih Member</option>
                            <?php foreach ($member as $m) : ?>
                                <option value="<?= $m["nama"]; ?>"><?= $m["nama"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="paket" id="paket" class="form-control">
                            <option value="">Pilihan Paket</option>
                            <?php foreach ($paket as $p) : ?>
                                <option value="<?= $p["id_paket"]; ?>"><?= $p["nama"]; ?> - <?= rupiah($p["harga"]); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="berat" id="berat" class="form-control" placeholder="Masukan Berat">
                        <input type="hidden" name="member" value="Member">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="cetak" tabindex="-1" role="dialog" aria-labelledby="menuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-light">
                <h5 class="modal-title" id="menuLabel"><strong>Cetak Laporan</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('laundry/laporan'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="bulan" class="font-weight-bold text-dark">Bulan</label>
                        <select name="bulan" id="bulan" class="form-control">
                            <option value="">Pilihan Bulan</option>
                            <?php foreach ($bulan as $b) : ?>
                                <option value="<?= $b["no"]; ?>"><?= $b["nama"]; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tahun" class="font-weight-bold text-dark">Tahun</label>
                        <select name="tahun" id="tahun" class="form-control">
                            <option value="">Pilihan Tahun</option>
                            <?php foreach ($tahun as $t) : ?>
                                <option value="<?= $t; ?>"><?= $t; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Cetak</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>