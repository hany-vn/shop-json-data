<main class="container py-5">
    <div class="row justify-content-center">

        <div class="col-md-5">
            <div class="border py-4 px-4">
                <form action="/auth/register-action" method="POST" enctype="multipart/form-data">
                    <h5 class="mb-5 text-center">Đăng ký hệ thống</h5>

                    <label>Họ và tên khách hàng:</label>
                    <input class="form-control mb-3" name="fullname">

                    <label>Số điện thoại:</label>
                    <input class="form-control mb-3" name="phone" type="number">

                    <label>Email (Tên đăng nhập):</label>
                    <input class="form-control mb-3" name="email" type="email">

                    <label>Mật khẩu:</label>
                    <input class="form-control mb-3" name="password" type="password">

                    <label>Nhập lại mật khẩu:</label>
                    <input class="form-control mb-3" name="confirm_password" type="password">

                    <label>Chọn ảnh để tải lên:</label>
                    <input class="form-control mb-3" name="img" type="file">

                    <div class="form-check mb-3 float-start">
                        <input class="form-check-input" type="checkbox" id="remember">
                        <label class="form-check-label" for="remember">
                            Lưu mật khẩu?
                        </label>
                    </div>

                    <div class="form-check mb-3 float-end">
                        <a href="<?=base('/auth/login')?>" class="text-decoration-none text-success">
                            <span class="form-check-label">
                                Đã có tài khoản?
                            </span>
                        </a>
                    </div>

                    <button class="btn btn-success w-100">Đăng ký</button>
                </form>
            </div>
        </div>

    </div>
</main>

<?php
notification();
?>