<?php

require_once './commons/env.php';
require_once './commons/function.php';

require_once './controllers/HomeController.php';


$act = $_GET['act'] ?? '/';

match ($act) {

   '/'=> (new HomeController())->home(),
};
