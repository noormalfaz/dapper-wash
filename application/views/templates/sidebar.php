<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>user">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-mail"></i>
        </div>
        <img src="<?= base_url(); ?>assets/img/Logo.png" width="50px">
        <div class="sidebar-brand-text mx-3">
            <span class="small font-weight-bold"><strong>Dapper Wash</strong></span>
        </div>
    </a>
    <hr class="sidebar-divider">
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`.`id_user_menu`, `menu` 
                    FROM `user_menu` JOIN `user_access_menu` 
                    ON `user_menu`.`id_user_menu` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id` = $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC
                ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading text-light">
            <?= $m["menu"]; ?>
        </div>
        <?php
        $menuId = $m["id_user_menu"];
        $querySubMenu = "SELECT * 
                            FROM `user_sub_menu`
                            WHERE `menu_id` = $menuId
                            AND `is_active` = 1
                        ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>
        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm["title"]) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url() . $sm['url']; ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm["title"]; ?></span>
                </a>
                </li>
            <?php endforeach; ?>
            <hr class="sidebar-divider mt-3">
        <?php endforeach; ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>auth/logout">
                <i class="fas fa-fw fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
</ul>