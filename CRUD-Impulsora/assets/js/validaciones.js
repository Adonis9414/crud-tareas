// Validar formulario de empleado
function validarFormularioEmpleado(event) {
    const nombre = document.getElementById('nombre').value.trim();
    const correo = document.getElementById('correo').value.trim();
    const departamento = document.getElementById('departamento').value.trim();

    if (!nombre || !correo || !departamento) {
        event.preventDefault();
        Swal.fire({
            title: 'Campos requeridos',
            text: 'Todos los campos son obligatorios',
            icon: 'warning',
            confirmButtonText: 'Aceptar'
        });
    }
}

// Validar formulario de equipo
function validarFormularioEquipo(event) {
    const nombre = document.getElementById('nombre').value.trim();
    const tipo = document.getElementById('tipo').value.trim();
    const numeroSerie = document.getElementById('numero_serie').value.trim();

    if (!nombre || !tipo || !numeroSerie) {
        event.preventDefault();
        Swal.fire({
            title: 'Campos requeridos',
            text: 'Todos los campos del equipo son obligatorios',
            icon: 'warning',
            confirmButtonText: 'Aceptar'
        });
    }
}