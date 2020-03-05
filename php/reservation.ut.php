<?php
$id = null;
session_start();

$id = $_SESSION['id'];

echo $id;