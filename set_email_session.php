<?php
session_start();

if (isset($_POST['email']) && !empty($_POST['email'])) {
    $_SESSION['email'] = $_POST['email'];
}
?>
