<?php
$titulo = 'Editar Equipos';
 include '../db/conexion.php';
 include '../includes/header.php'; 

$id = $_GET['id'] ?? null;
if (!$id) header('Location: listar.php');

$stmt = $conn->prepare("SELECT * FROM equipos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$equipo = $stmt->get_result()->fetch_assoc();

$empleados = $conn->query("SELECT id, nombre FROM empleados");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_equipo = trim($_POST['nombre_equipo']);
    $tipo = trim($_POST['tipo']);
    $numero_serie = trim($_POST['numero_serie']);
    $empleado_id = $_POST['empleado_id'] ?: null;

    if ($nombre_equipo && $tipo && $numero_serie) {
        $stmt = $conn->prepare("UPDATE equipos SET nombre_equipo=?, tipo=?, numero_serie=?, empleado_id=? WHERE id=?");
        $stmt->bind_param("sssii", $nombre_equipo, $tipo, $numero_serie, $empleado_id, $id);
        $stmt->execute();
        $_SESSION['mensaje'] = [
            'titulo' => 'Equipo registrado',
            'texto' => 'El equipo ha sido editado correctamente.',
            'icono' => 'success'
        ];
        header("Location: listar.php");
        exit;
    }
}
?>
    <form method="POST" onsubmit="validarFormularioEquipo(event)">
        <div class="mb-3">
            <label>Nombre del Equipo</label>
            <input type="text" name="nombre_equipo" class="form-control" value="<?= $equipo['nombre_equipo'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Tipo</label>
            <input type="text" name="tipo" class="form-control" value="<?= $equipo['tipo'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Número de Serie</label>
            <input type="text" name="numero_serie" class="form-control" value="<?= $equipo['numero_serie'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Empleado Asignado</label>
            <select name="empleado_id" class="form-select">
                <option value="">-- Sin asignar --</option>
                <?php while ($emp = $empleados->fetch_assoc()): ?>
                    <option value="<?= $emp['id'] ?>" <?= $emp['id'] == $equipo['empleado_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($emp['nombre']) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <button class="btn btn-primary" type="submit">Actualizar</button>
        <a href="listar.php" class="btn btn-secondary">Volver</a>
    </form>

<?php
include '../includes/footer.php'; 