<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--código que incluye Bootstrap-->
        <?php include'inc/incluye_bootstrap.php' ?>
        <?php include 'inc/conexion.php'; ?>
        <!--termina código que incluye Bootstrap-->

        <!-- PARA DATATABLE -->
        <link href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <!--código que incluye el menú responsivo-->
        <?php include'inc/incluye_menu.php' ?>
        <!--termina código que incluye el menú responsivo-->
        <div class="jumbotron">
                <?php
                //Consulta sin parámetros
                $sel = $con->prepare("SELECT *from proveedor");
                $sel->execute();
                $res = $sel->get_result();
                $row = mysqli_num_rows($res);
                ?>
                <h2>Listado de Proveedores</h2>
                Elementos devueltos por la consulta: <?php echo $row ?>
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <th>Id</th>
                    <th>Nombre del proveedor</th>
                    <th>Ver detalles</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    </thead>
                    <tfoot>
                    <th>Id</th>
                    <th>Nombre del proveedor</th>
                    <th>Ver detalles</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    </tfoot>
                    <tbody>
                        <?php while ($f = $res->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $f['proveedor_id'] ?></td>
                                <td><?php echo $f['proveedor_nombre'] ?></td>
                                <td><a href="proveedor_ver_detalles.php?id_proveedor=<?php echo $f['proveedor_id'] ?>"><span class="glyphicon glyphicon-list-alt"></span> Ver</a></td>
                                <td><a href="proveedor_actualizar.php?id_proveedor=<?php echo $f['proveedor_id'] ?>"><span class="glyphicon glyphicon-edit"> </span> Editar</a></td>
                                <td><a href="proveedor_eliminar.php?id_proveedor=<?php echo $f['proveedor_id'] ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></td>
                            </tr>
                            <?php
                        }
                        $sel->close();
                        $con->close();
                        ?>
                    <tbody>
                </table>
            </div>


    </body>
</html>