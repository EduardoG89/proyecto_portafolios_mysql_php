<?php
session_start();
if ($_POST) {
    if (($_POST['usuario'] == "eddudvp") && ($_POST['contrasenia'] == "12345")) {
        $_SESSION['usuario']="eddudvp";
        header("location:index.php");
    } else {
        echo "<script> alert('Usuario o contraseña incorrecta'); </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>

    <div class="container p-5">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-info bg-gradient">
                        Iniciar Sesión
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            <label>Usuario: </label>
                            <input class="form-control form-control-sm" type="text" name="usuario" id=""><br />
                            <label>Contraseña: </label>
                            <input class="form-control form-control-sm" type="password" name="contrasenia" id=""><br />
                            <button class="btn btn-sm btn-info" type="submit">Ingresar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>