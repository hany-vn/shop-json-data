<header>
    <div class="container fixed-top bg-white pt-3 mb-3">
        <div class="row w-100 align-items-center gx-lg-2 gx-0">
            <div class="col-xxl-2 col-lg-3 col-md-6 col-5">
                <a class="navbar-brand d-none d-lg-block" href="<?=base('/')?>">
                    <img src="<?= asset('img/logo.png') ?>" class="logo">
                </a>
                <div class="d-flex justify-content-between w-100 d-lg-none">
                    <a class="navbar-brand" href="<?=base('/')?>">
                        <img src="<?= asset('img/logo.png') ?>" class="logo">
                    </a>
                </div>
            </div>
            <div class="col-xxl-8 col-lg-8 d-none d-lg-block">
                <form action="#">
                    <div class="input-group mt-2">
                        <input class="form-control input-search border-end-0" type="text"
                               placeholder="Tìm kiếm sản phẩm">
                        <span class="input-group-append">
								<button class="btn bg-white border border-start-0 ms-n10 rounded-0 rounded-end btn-search"
                                        type="button">
									<i class="fa-solid fa-magnifying-glass"></i>
								</button>
							</span>
                    </div>
                </form>
            </div>
            <div class="col-lg-2 col-xxl-2 text-end col-md-6 col-7">
                <div class="list-inline">
                    <div class="list-inline-item me-5">

                    </div>
                    <div class="list-inline-item me-5">
                        <a href="#!" class="text-muted" data-bs-toggle="modal" data-bs-target="#userModal">
                            <i class="fa-regular fa-circle-user nav-icon"></i>
                        </a>
                        <?php
                        if (guest()) {
                            ?>
                            <div class="nav-user-menu">
                                <div class="text-center border-bottom m-3 py-2">
                                    <img src="<?= asset('img/avatar.png') ?>" class="avatar mb-2">
                                    <h6 class="fw-bold">Chưa đăng nhập</h6>
                                </div>
                                <div class="text-center">
                                    <a href="<?=base('/auth/login')?>" class="text-decoration-none">
                                        <button class="btn btn-primary btn-auth btn-sm"><i
                                                    class="fa-solid fa-right-to-bracket"></i> Đăng nhập
                                        </button>
                                    </a>
                                    <a href="<?=base('/auth/register')?>" class="text-decoration-none">
                                        <button class="btn btn-success btn-auth btn-sm"><i
                                                    class="fa-solid fa-user-plus"></i> Đăng ký
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="nav-user-menu">
                                <div class="text-center border-bottom m-3 py-2">
                                    <img src="<?= auth() ? auth('img') : asset('img/avatar.png') ?>" class="avatar mb-2">
                                    <h6 class="fw-bold"><?=auth('fullname')?></h6>
                                </div>
                                <div class="text-center">
                                    <a href="<?=base('/user/logout')?>">
                                        <button class="btn btn-primary btn-auth btn-sm"><i
                                                    class="fa-solid fa-right-to-bracket"></i> Đăng xuất
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="list-inline-item me-5 me-lg-0">
                        <a href="#" class="text-muted position-relative" data-bs-toggle="offcanvas"
                           data-bs-target="#cart">
                            <i class="fa-solid fa-cart-shopping nav-icon"></i>
                            </svg>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                <span id="cart_count">0</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 d-block d-lg-none">
                <form action="#">
                    <div class="input-group mt-2">
                        <input class="form-control input-search border-end-0" type="text"
                               placeholder="Tìm kiếm sản phẩm">
                        <span class="input-group-append">
								<button class="btn bg-white border border-start-0 ms-n10 rounded-0 rounded-end btn-search"
                                        type="button">
									<i class="fa-solid fa-magnifying-glass"></i>
								</button>
							</span>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="py-5"></div>
    <div class="col-12 d-block d-lg-none">
        <div class="py-2"></div>
    </div>
</header>
<?php
    require __DIR__."/cart.php";
    require __DIR__."/navbar.php";
?>