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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = new CarrosView;
    $data->editar($_POST);
    header("location: ../carro");
} else {
    $carro = CarrosView::selectFromEdit($_GET["id"]);
}

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cliente - Editar</title>
    <link rel="icon" href="/web/public/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php include_once '../templates/navbar.php' ?>

    <div class="container">
        <div class="my-5">
            <h2>EDITAR CARRO</h2>
        </div>
        <form action="editar.php" method="POST">
            <input type="hidden" class="form-control" id="id" name="id" value=<?php echo $carro->getId() ?>>
            <input type="hidden" class="form-control" id="cliente_id" name="cliente_id" value=<?php echo $carro->getCliente()->getId() ?>>
            <div class="mb-3">
                <label for="placa" class="form-label">Placa</label>
                <input type="text" class="form-control" id="placa" name="placa" value=<?php echo $carro->getPlaca() ?>>
            </div>
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" value=<?php echo $carro->getModelo() ?>>
            </div>
            <div class="mb-3">
                <label for="cor" class="form-label">Cor</label>
                <input type="text" class="form-control" id="cor" name="cor" value=<?php echo $carro->getCor() ?>>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>


    <?php include_once '../templates/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>

</html>