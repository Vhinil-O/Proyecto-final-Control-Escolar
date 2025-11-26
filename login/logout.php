<?php

include('../app/config.php');

session_start();
if (isset($_SESSION['sesionEmail'])) {
    session_destroy();
    header('Location: ' . APP_URL . '/login');
    exit; 
} else {
    header('Location: ' . APP_URL . '/login');
    exit;
}