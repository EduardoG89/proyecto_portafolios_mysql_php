<?php include("header.php"); ?>
<?php include("conexion_db.php"); ?>

<?php
if ($_POST) {
    $nombre = $_POST['nombre'];
    $fecha = new DateTime();//tiempo en que se sube el archivo para que no se sobreescriba al agregar otro dato
    $archivo =$fecha->getTimestamp()."_".$_FILES['imagen']['name'];
    $descripcion = $_POST['descripcion'];
    $imagen_temporal=$_FILES['imagen']['tmp_name'];//crear la imagen temporal
    move_uploaded_file($imagen_temporal,"images/".$archivo);//guarda la imagen temporal en la carpeta images

    $conexion = new conexion();
    $sql = "INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$archivo', '$descripcion');";
    $conexion->ejecutar($sql);
    header(("location:portafolio.php"));
}

if ($_GET) {
    $id=$_GET['borrar'];
    $conexion = new conexion();

    $archivo=$conexion->consultar(("SELECT imagen FROM `proyectos` WHERE id=".$id)); //selecciona el campo imagen para borrar atravez del id
    unlink("images/".$archivo[0]['imagen']); //con la funcion link se borra la imagen que esta en la carpeta
   
    $sql="DELETE FROM `proyectos` WHERE `proyectos` . `id` =".$id; //elimina el registro de la bd y la tabla
    $conexion->ejecutar($sql); //se realiza la instruccion sql
    header(("location:portafolio.php"));
}

$conexion = new conexion(); //instanciar
$proyectos = $conexion->consultar("SELECT * FROM `proyectos`");
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Datos del proyecto</h5>
                </div>
                <div class="card-body">
                    <form action="portafolio.php" method="post" enctype="multipart/form-data">
                        <label>Nombre del proyecto: </label>
                        <input required class="form-control form-control-sm" type="text" name="nombre" id=""> <br />
                        <label>Imagen del proyecto: </label>
                        <input required class="form-control form-control-sm" type="file" name="imagen" id=""> <br />
                        <label>Descripción: </label>
                        <textarea required class="form-control form-control-sm" name="descripcion" id="" cols="30" rows="5"></textarea> <br />
                        <input class="btn btn-info btn-sm" type="submit" value="Enviar proyecto">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead class="table-info">
                    <tr>
                        <th>
                            <h6>ID</h6>
                        </th>
                        <th>
                            <h6>Nombre</h6>
                        </th>
                        <th>
                            <h6>Imagen</h6>
                        </th>
                        <th>
                            <h6>Descripción</h6>
                        </th>
                        <th>
                            <h6>Acciones</h6>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($proyectos as $proyecto) { ?>
                        <tr>
                            <td><?php echo $proyecto['id']; ?></td>
                            <td><?php echo $proyecto['nombre']; ?></td>
                            <td><img width="100" src="images/<?php echo $proyecto['imagen']; ?>" alt=""></td>
                            <td><?php echo $proyecto['descripcion']; ?></td>
                            <td><a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']; ?>" role="button">Eliminar</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>






<?php include("footer.php"); ?>