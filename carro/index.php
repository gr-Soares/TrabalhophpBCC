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

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carro - Consulta</title>
    <link rel="icon" href="/web/public/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php include_once '../templates/navbar.php' ?>

    <div class="container">
        <div class="my-5 d-flex justify-content-between">
            <h2>CARROS</h2>
            <a class="btn btn-primary" href="/web/carro/inserir.php" role="button">Novo</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Carro</th>
                    <th scope="col">Cor</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php CarrosView::select() ?>
            </tbody>
        </table>
    </div>

    <?php include_once '../templates/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>

</html>