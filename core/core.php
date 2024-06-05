<?php

require_once "../models/User.php";
require_once "../models/Videogame.php";
require_once "usermanager.php";
require_once "videogamemanager.php";
require_once "sessions.php";

function render_template($template, $vars = []) {
    extract($vars);
    include "../templates/$template.php";
}