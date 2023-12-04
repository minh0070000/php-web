<?php
session_start();
if (isset($_SESSION['login_user_id']) && $_SESSION['login_user_id'] != NULL) {
    unset($_SESSION['login_user_id']);
    header('Location: ../index.php');
}
