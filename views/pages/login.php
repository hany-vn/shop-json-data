<main class="container py-5">
    <div class="row justify-content-center">

        <div class="col-md-5">
            <div class="border py-4 px-4">
                <form action="/auth/login-action" method="POST" enctype="multipart/form-data">
                    <h5 class="mb-5 text-center">Đăng nhập hệ thống</h5>
                    <label>Email (Tên đăng nhập):</label>
                    <input class="form-control mb-3" name="email" type="email">

                    <label>Mật khẩu:</label>
                    <input class="form-control mb-3" name="password" type="password">

                    <div class="form-check mb-3 float-start">
                        <input class="form-check-input" type="checkbox" id="remember">
                        <label class="form-check-label" for="remember">
                            Lưu mật khẩu?
                        </label>
                    </div>

                    <div class="form-check mb-3 float-end">
                        <a href="<?=base('/auth/register')?>" class="text-decoration-none text-primary">
                            <span class="form-check-label">
                                Chưa có tài khoản?
                            </span>
                        </a>
                    </div>

                    <button class="btn btn-primary w-100">Đăng nhập</button>
                </form>
            </div>
        </div>

    </div>
</main>

<?php
notification();
?>