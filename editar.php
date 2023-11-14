<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['id'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $id = $_GET['id'];

    $sentencia = $bd->prepare("select * from tbl_inventario where id = ?;");
    $sentencia->execute([$id]);
    $tbl_inventario = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos del inventario:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre de la pieza: </label>
                        <input type="text" class="form-control" name="nombre_pieza" required 
                        value="<?php echo $tbl_inventario->nombre_pieza; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Marca de la pieza: </label>
                        <input type="text" class="form-control" name="marca_pieza" autofocus required
                        value="<?php echo $tbl_inventario->marca_pieza; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Material de la pieza: </label>
                        <input type="text" class="form-control" name="material_pieza" autofocus required
                        value="<?php echo $tbl_inventario->material_pieza; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tamaño de la pieza: </label>
                        <input type="text" class="form-control" name="tamano_pieza" autofocus required
                        value="<?php echo $tbl_inventario->tamano_pieza; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock: </label>
                        <input type="number" class="form-control" name="stock" autofocus required
                        value="<?php echo $tbl_inventario->stock; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio unitario: </label>
                        <input type="text" class="form-control" name="precio_unitario" autofocus required
                        value="<?php echo $tbl_inventario->precio_unitario; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Valor total: </label>
                        <input type="text" class="form-control" name="valor_total" autofocus required
                        value="<?php echo $tbl_inventario->valor_total; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $tbl_inventario->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br><br><br>
<?php include 'template/footer.php' ?>