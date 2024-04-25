<div class="container">
    <ul class="nav nav-underline">
        <li class="nav-item">
            <a class="nav-link <?=checkActiveNavbar('/')?>" href="<?=base('/')?>">Trang chủ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=checkActiveNavbar('/product/create')?>" href="<?=base('/product/create')?>">Thêm sản phẩm</a>
        </li>
    </ul>
</div>

<?php
    function checkActiveNavbar($uri){
        if($_SERVER['REQUEST_URI'] == PREFIX.$uri){
            return 'text-success active';
        } else {
            return 'text-dark';
        }
    }
?>