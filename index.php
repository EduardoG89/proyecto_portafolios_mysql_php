<?php include("header.php"); ?>
<?php include("conexion_db.php"); ?>
<?php
$conexion = new conexion(); //instanciar
$proyectos = $conexion->consultar("SELECT * FROM `proyectos`");
?>

<div class="p-5 bg-light">
    <div class="container">
        <h1 class="display-3">Bienvenid@s</h1>
        <p class="lead">Este es el portafolio de eddudvp</p>
        <hr class="my-2">
        <p>Más Información</p>
    </div>
</div>

<?php foreach ($proyectos as $proyecto) { ?>
<?php } ?>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($proyectos as $proyecto) { ?>
        <div class="col">
            <div class="card">
                <img src=" images/<?php echo $proyecto['imagen']; ?>" class="card-img-top" alt="" height="200">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $proyecto['nombre']; ?></h5>
                    <p class="card-text"><?php echo $proyecto['descripcion']; ?></p>
                </div>
            </div>
        </div>
    <?php } ?>

</div>

<?php include("footer.php"); ?>