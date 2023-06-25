<?php
include_once 'C:\xampp\htdocs\web\view\carros.php';

use view\CarrosView;

CarrosView::remover($_GET["id"]);
header("location: ../carro");
