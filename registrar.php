<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["nombre_pieza"]) || empty($_POST["marca_pieza"]) || empty($_POST["material_pieza"]) || empty($_POST["tamano_pieza"]) || empty($_POST["stock"]) || empty($_POST["precio_unitario"]) || empty($_POST["valor_total"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre_pieza = $_POST['nombre_pieza'];
    $marca_pieza = $_POST['marca_pieza'];
    $material_pieza = $_POST['material_pieza'];
    $tamano_pieza = $_POST['tamano_pieza'];
    $stock = $_POST['stock'];
    $precio_unitario = $_POST['precio_unitario'];
    $valor_total = $_POST['valor_total'];
    
    $sentencia = $bd->prepare("INSERT INTO tbl_inventario(nombre_pieza,marca_pieza,material_pieza,tamano_pieza,stock,precio_unitario,valor_total) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre_pieza,$marca_pieza,$material_pieza,$tamano_pieza,$stock,$precio_unitario,$valor_total]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>