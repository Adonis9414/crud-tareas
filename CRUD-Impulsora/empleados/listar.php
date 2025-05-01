<?php
session_start();
$titulo = 'Listado de Empleados';
include '../includes/header.php';
include '../db/conexion.php';
?>

<a href="crear.php" class="btn btn-success mb-3">Agregar Empleado</a>
<input type="text" id="buscador" class="form-control mb-3" placeholder="Buscar empleados...">
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Departamento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="tabla-empleados">
    <?php
        $result = $conn->query("SELECT * FROM empleados");
        while($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?= htmlspecialchars($row['nombre']) ?></td>
            <td><?= htmlspecialchars($row['correo']) ?></td>
            <td><?= htmlspecialchars($row['departamento']) ?></td>
            <td>
                <a href="editar.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                <button class="btn btn-danger btn-sm" onclick="confirmarEliminacion('eliminar.php?id=<?= $row['id'] ?>')">Eliminar</button>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<nav>
    <ul class="pagination justify-content-center" id="paginacion"></ul>
</nav>

<?php
include '../includes/footer.php'; 
