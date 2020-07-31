<?php
include 'partials/header.php';
include 'moduloService.php';

$cedula = "";
$nombre = "";
$fechaNacimiento = "";
$codCliente = "";
$accion = "Agregar";
$test = new Test();

if (isset($_POST["accion"]) && ($_POST["accion"] == 'Agregar')) {
    $test->insert($_POST["nombre"]);
} else if (isset($_POST["accion"]) && ($_POST["accion"] == "Modificar")) {
    $test->update($_POST["nombre"], $_POST["codeTest"]);
} else if (isset($_GET["update"])) {
    $cliente = $test->findByPK($_GET["update"]);
    if ($cliente != null) {
        $codCliente = $cliente["code"];
        $nombre = $cliente["name"];
        $accion = "Modificar";
    }
} else if (isset($_POST["eliCodigo"])) {
    $test->delete($_POST["eliCodigo"]);
}
$result = $test->findAll();

?>

<main class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <!-- ADD TASK FORM -->
            <div class="card card-body">
                <form action="index.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Task Title" autofocus>
                    </div>
                    <input type="submit" name="accion" class="btn btn-success btn-block" value="Agregar">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['cod_role']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['cod_rol'] ?>" name="Modificar" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete_task.php?id=<?php echo $row['nombre'] ?>" name="eliCodigo" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr><?php }
                    } else {
                        ?>
                        <tr>
                            <td colspan="3">No hay datos</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include('partials/footer.php'); ?>