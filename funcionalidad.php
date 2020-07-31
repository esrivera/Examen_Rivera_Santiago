<?php
include 'partials/header.php';
include 'funcionalidadService.php';

$test = new FuncionalidadService();
$codigo = "";
$nombre = "";
$estado = "";
$accion = "Agregar";

if (isset($_POST["accion"]) && ($_POST["accion"] == 'Agregar')) {
    $test->insert($_POST["codigo"], $_POST["nombre"], $_POST["estado"]);
} else if (isset($_POST["accion"]) && ($_POST["accion"] == "Modificar")) {
    $test->update($_POST["nombre"], $_POST["codigo"]);
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
$result1 = $test->findAll();
?>

<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link
                                    waves-effect waves-dark sidebar-link" href="modulo.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Gestión Modulos</span></a></li>
            </ul>
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link
                                    waves-effect waves-dark sidebar-link" href="funcionalidad.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Gestión Funcionalidades</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- Table -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- title -->
                            <div class="d-md-flex align-items-center">
                                <img src="partials/assets/images/estadio.png" alt="homepage" class="dark-logo" />
                                <div>
                                    <h2 class="card-title">
                                        <p>&nbsp;&nbsp</p>Listado de Funcionalidades
                                    </h2>
                                </div>
                            </div>
                            <!-- title -->
                        </div>
                        <div class="col-md-4">
                            <div class="form">
                                <form action="buscar" method="POST">
                                    <div class="col-auto my-1">
                                        <h3 class="mr-sm-2" for="inlineFormCustomSelect">Modulo:</h3>
                                        <select name="modulo" class="custom-select mr-sm-4" id="inlineFormCustomSelect">
                                            <?php
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) { ?>
                                                    <option><?php echo $row['NOMBRE']; ?></option>
                                                <?php }
                                            } else { ?>
                                                <option>NA</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-auto my-1">
                                        <br />
                                        <button type="submit" class="btn btn-block btn-primary">Buscar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table v-middle">
                        <thead>
                            <tr class="bg-light">
                                <th class="border-top-0">Nombre</th>
                                <th class="border-top-0">URL</th>
                                <th class="border-top-0">Descripción</th>
                                <th class="border-top-0">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5">NO HAY DATOS</td>;
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Table -->

    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-body">
                <form name="forma" class="form-horizontal form-material" method="post" action="index.php">
                    <input type="hidden" name="codEstadio" value="<?php echo $codEstadio ?>">
                    <div class="form-group">
                        <label class="col-md-12">URL</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="" class="form-control
                                            form-control-line" name="nombre" id="nombre" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Nombre</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="" class="form-control
                                            form-control-line" name="ciudad" id="ciudad" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Descripción</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="" class="form-control
                                            form-control-line" name="direccion" id="direccion" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Modulo:</label>
                        <select name="modulo" class="custom-select mr-sm-4" id="inlineFormCustomSelect">
                            <?php
                            if ($result1->num_rows > 0) {
                                while ($row = $result1->fetch_assoc()) { ?>
                                    <option><?php echo $row['NOMBRE']; ?></option>
                                <?php }
                            } else { ?>
                                <option>NA</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input class="btn btn-success
                                            btn-block" type="submit" name="accion" value="<?php echo $accion ?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>

<?php include('partials/footer.php'); ?>