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
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#add">
                        <i class="fas fa-fw fa-plus mr-1"></i>Tambah Paket Baru
                    </button>
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" paket="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Proses</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($paket as $p) : ?>
                                    <tr>
                                        <td scope="row"><?= $no++; ?></td>
                                        <td scope="row"><?= $p["kode"]; ?></td>
                                        <td scope="row"><?= $p["nama"]; ?></td>
                                        <td scope="row"><?= rupiah($p["harga"]); ?></td>
                                        <td scope="row"><?= $p["hari"]; ?> Hari</td>
                                        <td>
                                            <a href="<?= base_url('paket/editpaket/') . $p['id_paket']; ?>" class="btn btn-success">Edit</a>
                                            <a href="<?= base_url(); ?>paket/deletepaket/<?= $p['id_paket']; ?>" class="btn btn-danger tombol-hapus">Hapus</a>
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
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="menuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-light">
                <h5 class="modal-title" id="menuLabel"><strong>Tambah Paket Baru</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('paket'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="kode" id="kode" class="form-control" value="<?= $kode; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Paket">
                    </div>
                    <div class="form-group">
                        <input type="text" name="harga" id="harga" class="form-control" placeholder="Harga Paket">
                    </div>
                    <div class="form-group">
                        <input type="text" name="hari" id="hari" class="form-control" placeholder="Hari">
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