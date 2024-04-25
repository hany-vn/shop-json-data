<main class="container py-5">
    <h3 class="text-center mb-5">DANH MỤC SẢN PHẨM</h3>
    <div class="row">

        <?php foreach ($params['products'] as $product) { ?>
            <div class="col-6 col-md-3 mb-5">
                <div class="card border-0 card-product">
                    <img src="<?= $product['img'] ?>"
                         class="rounded card-img">
                    <div class="card-img-fill"></div>
                    <div class="card-btn">
                        <button onclick='addCart(<?= json_encode($product, JSON_UNESCAPED_UNICODE) ?>)' class="btn-product"><i class="fa-solid fa-cart-shopping"></i></button>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title"><?= $product['name'] ?></h5>
                        <p class="card-text text-danger fw-bold"><?= number_format($product['price']) ?>đ</p>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</main>

<?php
notification();
?>