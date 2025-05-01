<?php
$titulo = 'Listado de Equipos';
include '../includes/header.php'; 
include '../db/conexion.php';?>

<a href="crear.php" class="btn btn-success mb-3">Agregar Equipo</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre del Equipo</th>
            <th>Tipo</th>
            <th>Número de Serie</th>
            <th>Empleado Asignado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "
            SELECT equipos.*, empleados.nombre AS nombre_empleado
            FROM equipos
            LEFT JOIN empleados ON equipos.empleado_id = empleados.id
        ";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?= htmlspecialchars($row['nombre_equipo']) ?></td>
            <td><?= htmlspecialchars($row['tipo']) ?></td>
            <td><?= htmlspecialchars($row['numero_serie']) ?></td>
            <td><?= htmlspecialchars($row['nombre_empleado'] ?? 'Sin asignar') ?></td>
            <td>
                <a href="editar.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                <button class="btn btn-danger btn-sm" onclick="confirmarEliminacion('eliminar.php?id=<?= $row['id'] ?>')">Eliminar</button>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php
include '../includes/footer.php'; 
