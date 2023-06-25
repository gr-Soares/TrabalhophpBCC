<?php
include_once 'C:\xampp\htdocs\web\view\controle.php';

use view\ControleView;

$result = ControleView::entrada($_GET["id"]);
if($result == 1){
    header("location: ../controle/erroEntrada.php");
}else{
    header("location: /web");
}
