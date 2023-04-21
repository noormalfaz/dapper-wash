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
                        <i class="fas fa-fw fa-plus mr-1"></i>Tambah Member
                    </button>
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" member="alert">
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
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No. Handphone</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($member as $m) : ?>
                                    <tr>
                                        <td scope="row"><?= $no++; ?></td>
                                        <td scope="row"><?= $m["kode"]; ?></td>
                                        <td scope="row"><?= $m["nama"]; ?></td>
                                        <td scope="row"><?= $m["alamat"]; ?></td>
                                        <td scope="row"><?= $m["nohp"]; ?></td>
                                        <td>
                                            <a href="<?= base_url("laundry/editmember/") . $m["id_member"]; ?>" class="btn btn-success">Edit</a>
                                            <a href="<?= base_url(); ?>laundry/deletemember/<?= $m['id_member']; ?>" class="btn btn-danger tombol-hapus">Hapus</a>
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
                <h5 class="modal-title" id="menuLabel"><strong>Tambah Member</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('laundry'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="kode" id="kode" class="form-control" value="<?= $kode; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Member">
                    </div>
                    <div class="form-group">
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat Member">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nohp" id="nohp" class="form-control" placeholder="No. Handphone">
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