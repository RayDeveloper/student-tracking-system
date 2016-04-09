<?php
session_start();
$var_value = $_SESSION['data'];

echo json_encode ($var_value);
?>
