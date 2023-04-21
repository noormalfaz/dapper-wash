<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header">
                    <h1 class="h3 mb-0 font-weight-bold text-dark text-center"><?= $title; ?></h1>
                </div>
                <div class="card card-body">
                    <form action="" method="post">
                        <div class="form-group row">
                            <input type="hidden" name="id_user_sub_menu" value="<?= $submenu['id_user_sub_menu']; ?>">
                            <label for="title" class="col-sm-2 mt-0 mt-lg-2 font-weight-bold text-dark">Submenu</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" id="title" class="form-control" value="<?= $submenu['title']; ?>">
                                <?= form_error("title", '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="menu_id" class="col-sm-2 mt-0 mt-lg-2 font-weight-bold text-dark">Menu</label>
                            <div class="col-sm-10">
                                <select name="menu_id" id="menu_id" class="form-control">
                                    <?php foreach ($menu as $m) : ?>
                                        <?php if ($m["id"] == $submenu["menu_id"]) : ?>
                                            <option value="<?= $m["id_user_menu"]; ?>" selected><?= $m["menu"]; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $m["id_user_menu"]; ?>"><?= $m["menu"]; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="url" class="col-sm-2 mt-0 mt-lg-2 font-weight-bold text-dark">Url</label>
                            <div class="col-sm-10">
                                <input type="text" name="url" id="url" class="form-control" value="<?= $submenu['url']; ?>">
                                <?= form_error("url", '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="icon" class="col-sm-2 mt-0 mt-lg-2 font-weight-bold text-dark">Ikon</label>
                            <div class="col-sm-10">
                                <input type="text" name="icon" id="icon" class="form-control" value="<?= $submenu['icon']; ?>">
                                <?= form_error("icon", '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <div class="">
                                    <?php if ($submenu["is_active"] == 1) : ?>
                                        <input type="checkbox" name="is_active" id="is_active" value="1" class="form-check-input ml-0" checked>
                                    <?php else : ?>
                                        <input type="checkbox" name="is_active" id="is_active" value="1" class="form-check-input ml-0">
                                    <?php endif; ?>
                                    <label for="is_active" class="ml-3">
                                        Aktif?
                                    </label>
                                </div>
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