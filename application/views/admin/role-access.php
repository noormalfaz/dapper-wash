<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h1 class="h3 mb-0 font-weight-bold text-dark"><?= $title;?></h1>
                </div>
                <div class="card-body">
                    <?=  $this->session->flashdata("message");?>
                    <h5>Role : <?= $role["role"];?></h5>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Akses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1; 
                                foreach($menu as $m):?>
                                    <tr>
                                        <td scope="row"><?= $no++;?></td>
                                        <td><?= $m["menu"];?></td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" <?= check_access($role["id_user_role"], $m["id_user_menu"]);?> data-role="<?= $role["id_user_role"];?>" data-menu="<?= $m["id_user_menu"];?>">
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
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