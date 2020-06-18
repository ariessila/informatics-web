<?php
// Gabung layout jadi satu
require_once 'head.php';
if (get_cookie('lang') == 'en') require_once 'nav_#en.php';
else require_once 'nav_#id.php';
// require_once 'slider.php';
require_once 'content.php';
if (get_cookie('lang') == 'en') require_once 'footer_#en.php';
else require_once 'footer_#id.php';
