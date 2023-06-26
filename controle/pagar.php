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

$result = ControleView::pagar($_GET["id"]);
if ($result == 1) {
    header("location: ../controle/erroPagar.php");
} else {
    header("location: /web");
}
