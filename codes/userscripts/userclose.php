<?php
require_once("settings.php");
session_destroy();
header("Location: ../../login.php");