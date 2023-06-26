<?php
session_start();
$token = $_SESSION["token"];
if ($token == "") {
    header("location: /web/login.php");
}
?>
<?php
include_once 'C:\xampp\htdocs\web\view\controle.php';

use view\ControleView;

$result = ControleView::saida($_GET["id"]);
if ($result == 1) {
    header("location: ../controle/erroSaida.php");
} else {
    header("location: /web");
}
