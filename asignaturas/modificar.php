<?php

require_once('../conn.php');

$id_asignatura = isset($_REQUEST['id_asignatura']) ? $_REQUEST['id_asignatura'] : null;
$nombre_asignatura = isset($_REQUEST['nombre_asignatura']) ? $_REQUEST['nombre_asignatura'] : null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['update'])) {
        $update = $conn->prepare("UPDATE asignaturas SET nombre_asignatura='$nombre_asignatura' WHERE id_asignatura = $id_asignatura;");
    }

    $update->execute();
    header('Location: ./');

} else {
    $consulta = $conn->prepare("SELECT * FROM asignaturas WHERE id_asignatura = $id_asignatura;");
    $consulta->execute();
}
$asignaturas = $consulta->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Asignatura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body class="container border border-2 mt-3">

    <h1 class="mt-3">Modificar</h1>

    <form method="post">

        <div class="mb-3">
            <label for="id_asignatura" class="form-label">ID Asignatura</label>
            <input disabled min="1" value="<?= $asignaturas['id_asignatura'] ?>" name="id_asignatura" id="id_asignatura" type="number" class="form-control">
        </div>

        <div class="mb-3">
            <label for="nombre_asignatura" class="form-label">Nombre de la Asignatura</label>
            <input name="nombre_asignatura" value="<?= $asignaturas['nombre_asignatura'] ?>" id="nombre_asignatura" type="text" class="form-control">
        </div>

        <button name="update" type="submit" class="btn btn-success mb-3">Modificar</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>