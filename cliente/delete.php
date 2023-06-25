<?php
include_once 'C:\xampp\htdocs\web\view\clientes.php';

use view\ClientesView;

ClientesView::remover($_GET["id"]);
header("location: ../cliente");
