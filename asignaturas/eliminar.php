<?php 

require_once('../conn.php');

$id_asignatura = isset($_REQUEST['id_asignatura']) ? $_REQUEST['id_asignatura'] : null;
$delete = "DELETE FROM asignaturas WHERE id_asignatura = $id_asignatura;";
$conn->exec($delete);

header('Location: ./');

?>