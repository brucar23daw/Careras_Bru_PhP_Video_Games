<?php

require_once "../core/core.php";

session_start();

if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
    render_template('dashboard', $_SESSION);
} else {
    header('location: login.php');
}