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
                        <i class="fas fa-fw fa-plus mr-1"></i>Tambah Role Baru
                    </button>
                    <?= form_error("role", '<div class="alert alert-danger" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); ?>
                    <div class="error-data" data-error="<?= $this->session->flashdata("error"); ?>"></div>
                    <div class="success-data" data-success="<?= $this->session->flashdata("success"); ?>"></div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="dataTable">
                            <thead>
                                <tr class="font-weight-bold text-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($role as $r) : ?>
                                    <tr>
                                        <td scope="row"><?= $no++; ?></td>
                                        <td><?= $r["role"]; ?></td>
                                        <td>
                                            <a href="<?= base_url("admin/roleaccess/") . $r["id_user_role"]; ?>" class="btn btn-warning">Akses</a>
                                            <a href="<?= base_url("admin/editrole/") . $r["id_user_role"]; ?>" class="btn btn-success">Edit</a>
                                            <a href="<?= base_url(); ?>admin/deleterole/<?= $r['id_user_role']; ?>" class="btn btn-danger tombol-hapus">Hapus</a>
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
            <div class="modal-header bg-info text-light font-weight-bold">
                <h5 class="modal-title" id="menuLabel">Tambah Role Baru</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="role" id="role" class="form-control" placeholder="Nama Role...">
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