<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata("message"); ?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg">
            <div class="card shadow">
                <div class="card-header">
                    <h1 class="h3 mb-0 font-weight-bold text-dark text-center"><?= $title; ?></h1>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#add">
                        <i class="fas fa-fw fa-plus mr-1"></i>Tambah Submenu Baru
                    </button>
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" submenu="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="dataTable">
                            <thead>
                                <tr class="font-weight-bold text-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Url</th>
                                    <th scope="col">Ikon</th>
                                    <th scope="col">Aktif</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($subMenu as $sm) : ?>
                                    <tr>
                                        <td scope="row"><?= $no++; ?></td>
                                        <td><?= $sm["title"]; ?></td>
                                        <td><?= $sm["menu"]; ?></td>
                                        <td><?= $sm["url"]; ?></td>
                                        <td><?= $sm["icon"]; ?></td>
                                        <td><?= $sm["is_active"]; ?></td>
                                        <td>
                                            <a href="<?= base_url("menu/editsubmenu/") . $sm["id_user_sub_menu"]; ?>" class="btn btn-success">Edit</a>
                                            <a href="<?= base_url(); ?>menu/deletesubmenu/<?= $sm['id_user_sub_menu']; ?>" class="btn btn-danger tombol-hapus">Hapus</a>
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
                <h5 class="modal-title" id="menuLabel"><strong>Tambah Submenu Baru</strong></h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="title" id="title" class="form-control" placeholder="Judul Submenu...">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Pilihan Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m["id_user_menu"]; ?>"><?= $m["menu"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="url" id="url" class="form-control" placeholder="Submenu Url">
                    </div>
                    <div class="form-group">
                        <input type="text" name="icon" id="icon" class="form-control" placeholder="Submenu Ikon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" id="is_active" value="1" class="form-check-input" checked>
                            <label for="is_active" class="form-check-label">
                                Aktif?
                            </label>
                        </div>
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