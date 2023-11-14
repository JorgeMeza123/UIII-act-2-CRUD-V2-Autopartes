<?php
    print_r($_POST);
    if(!isset($_POST['id'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $nombre_pieza = $_POST['nombre_pieza'];
    $marca_pieza = $_POST['marca_pieza'];
    $material_pieza = $_POST['material_pieza'];
    $tamano_pieza = $_POST['tamano_pieza'];
    $stock = $_POST['stock'];
    $precio_unitario = $_POST['precio_unitario'];
    $valor_total = $_POST['valor_total'];
    $id = $_POST['id'];

    $sentencia = $bd->prepare("UPDATE tbl_inventario SET nombre_pieza = ?, marca_pieza = ?, material_pieza = ?, tamano_pieza = ?, stock = ?, precio_unitario = ?, valor_total = ? where id = ?;");
    $resultado = $sentencia->execute([$nombre_pieza, $marca_pieza, $material_pieza, $tamano_pieza, $stock, $precio_unitario, $valor_total, $id]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>