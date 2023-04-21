<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h1 class="h3 mb-0 font-weight-bold text-dark text-center"><?= $title; ?></h1>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#add">
                        <i class="fas fa-fw fa-plus mr-1"></i>Tambah Menu Baru
                    </button>
                    <?= form_error("menu", '<div class="alert alert-danger" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); ?>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="dataTable">
                            <thead>
                                <tr class="font-weight-bold text-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($menu as $m) : ?>
                                    <tr>
                                        <td scope="row"><?= $no++; ?></td>
                                        <td><?= $m["menu"]; ?></td>
                                        <td>
                                            <a href="<?= base_url("menu/editmenu/") . $m["id_user_menu"]; ?>" class="btn btn-success">Edit</a>
                                            <a href="<?= base_url(); ?>menu/deletemenu/<?= $m['id_user_menu']; ?>" class="btn btn-danger tombol-hapus">Hapus</a>
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
                <h5 class="modal-title" id="menuLabel"><strong>Tambah Menu Baru</strong></h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="menu" id="menu" class="form-control" placeholder="Nama Menu...">
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