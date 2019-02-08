<?php
require_once 'data.php';
unset($_SESSION['user']);

header("Location: /OrickHut/index.php");
exit;
