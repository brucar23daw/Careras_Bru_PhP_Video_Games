<?php

require_once "../core/core.php";

$user = new User('admin', 'admin', 'admin@fjeclot.edu');
$user->hashPassword('admin');

var_dump($user);

save_user($user);