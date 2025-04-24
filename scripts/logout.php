<?php
require_once(__DIR__ . '/starter.php');
session_unset();
session_destroy();
redirectToUrl('index.php')
?>