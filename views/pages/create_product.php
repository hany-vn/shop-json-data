<main class="container py-5">
    <div class="row justify-content-center">

        <div class="col-md-5">
            <div class="border py-4 px-4">
                <form action="/product/create-action" method="POST" enctype="multipart/form-data">
                    <h5 class="mb-5 text-center">Thêm sản phẩm</h5>
                    <label>Tên sản phẩm:</label>
                    <input class="form-control mb-3" name="name" type="text">

                    <label>Giá:</label>
                    <input class="form-control mb-3" name="price" type="number" value="0">

                    <label>Ảnh:</label>
                    <input class="form-control mb-3" name="img" type="file">

                    <button class="btn btn-primary w-100">Thêm sản phẩm</button>
                </form>
            </div>
        </div>

    </div>
</main>

<?php
notification();
?>