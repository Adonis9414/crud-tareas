function confirmarEliminacion(url) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "No podrás revertir esta acción",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Eliminado',
                text: "El registro fue eliminado correctamente.",
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                window.location.href = url;
            });
        }
    });
}
    

//busqueda y paginacion
document.addEventListener("DOMContentLoaded", function () {
    const input = document.getElementById("buscador");
    const todasFilas = Array.from(document.querySelectorAll("#tabla-empleados tr"));
    const filasPorPagina = 5;
    const paginacion = document.getElementById("paginacion");

    let filasFiltradas = [...todasFilas]; 

    function mostrarPagina(pagina) {
        const inicio = (pagina - 1) * filasPorPagina;
        const fin = inicio + filasPorPagina;

        filasFiltradas.forEach((fila, i) => {
            fila.style.display = i >= inicio && i < fin ? "" : "none";
        });
    }

    function crearBotones() {
        const totalPaginas = Math.ceil(filasFiltradas.length / filasPorPagina);
        paginacion.innerHTML = "";

        for (let i = 1; i <= totalPaginas; i++) {
            const li = document.createElement("li");
            li.className = "page-item";
            const btn = document.createElement("button");
            btn.textContent = i;
            btn.className = "page-link";
            btn.onclick = () => mostrarPagina(i);
            li.appendChild(btn);
            paginacion.appendChild(li);
        }
    }

    function aplicarFiltro() {
        const filtro = input.value.toLowerCase();
        filasFiltradas = todasFilas.filter(fila => fila.textContent.toLowerCase().includes(filtro));
        mostrarPagina(1);
        crearBotones();
    }

    input.addEventListener("keyup", aplicarFiltro);

    // Inicial
    aplicarFiltro();
});