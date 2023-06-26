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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = new ClientesView;
    $data->editar($_POST);
    header("location: ../cliente");
}else{
    $cliente = ClientesView::selectFromEdit($_GET["id"]);
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
            <h2>EDITAR CLIENTE</h2>
        </div>
        <form action="editar.php" method="POST">
            <input type="hidden" class="form-control" id="id" name="id" value=<?php echo $cliente->getId() ?>>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value=<?php echo $cliente->getNome() ?>>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value=<?php echo $cliente->getEmail() ?>>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value=<?php echo $cliente->getTelefone() ?>>
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