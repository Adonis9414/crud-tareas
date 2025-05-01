Tema: Gestión de Empleados y Equipos
Cada empleado puede tener asignados varios equipos. El sistema permite:
1. Módulo de Empleados
- Crear empleado (nombre, correo, departamento)
- Listar empleados (tabla con búsqueda y paginación simple)
- Editar empleado
- Eliminar empleado con confirmación (SweetAlert)
2. Módulo de Equipos
- Crear equipo (nombre del equipo, tipo, número de serie)
- Asignar equipo a un empleado (formulario con select)
- Ver listado de equipos con el nombre del empleado asignado
- Editar y eliminar equipos
3. Validaciones
- Validar en el servidor que ningún campo venga vacío.
- Validaciones del lado cliente con JavaScript.
- Confirmación de eliminación, creacion o edicion con SweetAlert2.

- Mostrar alertas de éxito/error con SweetAlert2 (no usar alert()).


Viene con un archivo sql que fue el export donde se realizaron prubeas 
asi com otro llamado init para crear la BD y las tablas descde cero 

se conecta a una base de datos mysql
se puede editar en conexion.php
