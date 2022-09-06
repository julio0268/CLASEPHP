<?php 

try {
    require_once('../conn.php');

    $asignaturas = $conn->prepare("SELECT * FROM asignaturas;");
    $asignaturas->execute();

    if (isset($_REQUEST['add'])) {

        $id_asignatura = isset($_REQUEST['id_asignatura']) ? $_REQUEST['id_asignatura'] : null;
        $nombre_asignatura = isset($_REQUEST['nombre_asignatura']) ? $_REQUEST['nombre_asignatura'] : null;

        if ($id_asignatura == null) {
            $id_asignatura = $asignaturas->rowCount() + 1;
        }

        $insert = "INSERT INTO asignaturas VALUES ($id_asignatura, '$nombre_asignatura');";
        $conn->exec($insert);

        header('Location: ./');

    }

} catch (PDOException $e) {
    echo $e->getMessage();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Asignaturas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="container mt-3">
    <table class="table table-dark table-striped">
        <tr>
            <th>ID Asignatura</th>
            <th>Nombre de la Asignatura</th>
            <th colspan="2" style="text-align: center;">Acciones</th>
        </tr>
        <?php foreach ($asignaturas as $key => $value) : ?>
            
        <tr>
            <td><?= $value['id_asignatura']; ?></td>
            <td><?= $value['nombre_asignatura']; ?></td>
            <td>
                <a href="modificar.php?id_asignatura=<?= $value['id_asignatura']; ?>">
                    <button type="button" class="btn btn-info">Modificar</button>
                </a>
            </td>
            <td>
                <a href="eliminar.php?id_asignatura=<?= $value['id_asignatura']; ?>">
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addAsignatura">Agregar Asignatura</button>

    <div class="modal fade" id="addAsignatura">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ingresar Asignatura</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="mb-3">
                            <label for="id_asignatura" class="form-label">ID Asignatura</label>
                            <input disabled min="1" value="<?= $asignaturas->rowCount() + 1; ?>" type="number" name="id_asignatura" id="id_asignatura" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="nombre_asignatura" class="form-label">Nombre de la Asignatura</label>
                            <input required type="text" name="nombre_asignatura" id="nombre_asignatura" class="form-control">
                        </div>

                        <button name="add" type="submit" class="btn btn-success">Agregar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>