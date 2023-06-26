<?php
session_start();
$token = $_SESSION["token"];
if ($token == "") {
    header("location: /web/login.php");
}
?>

<?php
include_once 'C:\xampp\htdocs\web\view\carros.php';

use view\CarrosView;

CarrosView::remover($_GET["id"]);
header("location: ../carro");
