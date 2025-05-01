<?php 
$titulo = 'Editar Empleados';
include '../includes/header.php';
include '../db/conexion.php';


$id = $_GET['id'] ?? null;
if (!$id) header("Location: listar.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $departamento = trim($_POST['departamento']);

    if ($nombre && $correo && $departamento) {
        $stmt = $conn->prepare("UPDATE empleados SET nombre=?, correo=?, departamento=? WHERE id=?");
        $stmt->bind_param("sssi", $nombre, $correo, $departamento, $id);
        $stmt->execute();
        $_SESSION['mensaje'] = [
            'titulo' => 'Empleado editado',
            'texto' => 'El empleado ha sido editado correctamente.',
            'icono' => 'success'
        ];
        header("Location: listar.php");
        exit;
    }
}

$stmt = $conn->prepare("SELECT * FROM empleados WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$empleado = $stmt->get_result()->fetch_assoc();
?>

    <form method="POST" onsubmit="validarFormularioEmpleado(event)">
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?= $empleado['nombre'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Correo</label>
            <input type="email" name="correo" class="form-control" value="<?= $empleado['correo'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Departamento</label>
            <input type="text" name="departamento" class="form-control" value="<?= $empleado['departamento'] ?>" required>
        </div>
        <button class="btn btn-primary" type="submit">Actualizar</button>
        <a href="listar.php" class="btn btn-secondary">Volver</a>
    </form>

<?php
include '../includes/footer.php'; 