<?php
session_start();
ob_start();
// Get modules need to use for main content by using $_GET
$module = isset($_GET['m']) ? $_GET['m'] : null;
//$module = $_GET['m'];

// If there is no get param to load page, set $module default to home page
if ($module == null) {
    $module = 'home';
}
require __DIR__ . '/config.php';
require __DIR__ . '/libs/db.php';

$mysql = new DB(
    $db_config['host'],
    $db_config['user'],
    $db_config['password'],
    $db_config['db_name'],
);

# Include header
require __DIR__ . '/modules/partials/header.php';
# Include main contain
if ($module != 'register') {
    require __DIR__ . "/modules/$module.php";
} elseif ($module != null) {
    require __DIR__ . "/$module.php";
}
# Include footer
require __DIR__ . '/modules/partials/footer.php';
ob_end_flush();
