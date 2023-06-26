<?php
session_start();
$token = $_SESSION["token"];
if ($token == "") {
    header("location: /web/login.php");
}
?>

<?php
include_once 'C:\xampp\htdocs\web\view\clientes.php';

use view\ClientesView;

ClientesView::remover($_GET["id"]);
header("location: ../cliente");
