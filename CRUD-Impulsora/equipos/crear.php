<?php
$titulo = 'Listado de Equipos';
include '../includes/header.php'; 
 include '../db/conexion.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_equipo = trim($_POST['nombre_equipo']);
    $tipo = trim($_POST['tipo']);
    $numero_serie = trim($_POST['numero_serie']);
    $empleado_id = $_POST['empleado_id'] ?: null;

    // Validar numero de serie
    $query_check = $conn->prepare("SELECT id FROM equipos WHERE numero_serie = ?");
    $query_check->bind_param("s", $numero_serie);
    $query_check->execute();
    $query_check->store_result();

    if ($query_check->num_rows > 0) {
        $_SESSION['mensaje'] = [
            'titulo' => 'Número de serie duplicado',
            'texto' => 'Ya existe un equipo con ese número de serie',
            'icono' => 'warning'
        ];
        header("Location: crear.php");
        exit();
    }
   

    if ($nombre_equipo && $tipo && $numero_serie) {
        $stmt = $conn->prepare("INSERT INTO equipos (nombre_equipo, tipo, numero_serie, empleado_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $nombre_equipo, $tipo, $numero_serie, $empleado_id);
        $stmt->execute();
        $_SESSION['mensaje'] = [
            'titulo' => 'Equipo registrado',
            'texto' => 'El equipo ha sido agregado correctamente.',
            'icono' => 'success'
        ];
        header('Location: listar.php');
        exit;
    }
}

$empleados = $conn->query("SELECT id, nombre FROM empleados");
?>

    <form method="POST" onsubmit="validarFormularioEquipo(event)">
        <div class="mb-3">
            <label>Nombre del Equipo</label>
            <input type="text" name="nombre_equipo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tipo</label>
            <input type="text" name="tipo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Número de Serie</label>
            <input type="text" name="numero_serie" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Asignar a Empleado (opcional)</label>
            <select name="empleado_id" class="form-select">
                <option value="">-- Sin asignar --</option>
                <?php while ($emp = $empleados->fetch_assoc()): ?>
                    <option value="<?= $emp['id'] ?>"><?= htmlspecialchars($emp['nombre']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button class="btn btn-primary" type="submit">Guardar</button>
        <a href="listar.php" class="btn btn-secondary">Volver</a>
    </form>
<?php
include '../includes/footer.php'; 