<?php
$titulo = 'Crear Empleado';
include '../includes/header.php';
include '../db/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $departamento = trim($_POST['departamento']);

    if ($nombre && $correo && $departamento) {
        $stmt = $conn->prepare("INSERT INTO empleados (nombre, correo, departamento) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $correo, $departamento);
        $stmt->execute();
        $_SESSION['mensaje'] = [
            'titulo' => 'Empleado registrado',
            'texto' => 'El empleado ha sido agregado correctamente.',
            'icono' => 'success'
        ];
        header("Location: listar.php");
        exit;
    }
}
?>

    <form method="POST" onsubmit="validarFormularioEmpleado(event)">
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Correo</label>
            <input type="email" name="correo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Departamento</label>
            <input type="text" name="departamento" class="form-control" required>
        </div>
        <button class="btn btn-primary" type="submit">Guardar</button>
        <a href="listar.php" class="btn btn-secondary">Volver</a>
    </form>

    <script>
    function validarFormulario() {
        const campos = document.querySelectorAll('input[required]');
        for (let campo of campos) {
            if (!campo.value.trim()) {
                Swal.fire('Error', 'Todos los campos son obligatorios', 'error');
                return false;
            }
        }
        return true;
    }
    </script>
<?php
include '../includes/footer.php'; 