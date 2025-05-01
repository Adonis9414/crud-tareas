<?php
 include '../db/conexion.php';


$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $conn->prepare("DELETE FROM equipos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
header("Location: listar.php");
exit;
