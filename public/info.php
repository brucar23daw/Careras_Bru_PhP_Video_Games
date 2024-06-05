<?php

require_once "../core/core.php";

session_start();

render_template('info', ['logged' => isset($_SESSION['username']) && isset($_SESSION['role'])]);