<div id="content-wrapper" class="d-flex flex-column">
<div id="content">
    <nav class="navbar navbar-expand navbar-dark bg-info topbar mb-4 static-top shadow">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline font-weight-bold text-light"><?= $user["name"];?></span>
                    <img class="img-profile rounded-circle"
                        src="<?= base_url()."assets/img/profile/".$user['image'];?>">
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url();?>auth/logout" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-dark"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>