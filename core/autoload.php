<?php
session_start();

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../config/core.php';
require_once __DIR__.'/../config/define.php';

require_once __DIR__.'/../helpers/core.php';
require_once __DIR__.'/../helpers/base.php';

require_once __DIR__.'/mvc/Controller.php';
require_once __DIR__.'/mvc/Model.php';