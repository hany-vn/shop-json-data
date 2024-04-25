<?php
require __DIR__."/partials/head.php";
require __DIR__."/partials/header.php";

require __DIR__."/pages/".($params['page'] ?? "home").".php";

require __DIR__."/partials/footer.php";
