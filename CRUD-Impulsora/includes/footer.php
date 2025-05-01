</div> 
<!-- JS personalizado -->
<script src="../assets/js/funciones.js"></script>
<script src="../assets/js/validaciones.js"></script>

<?php
if (isset($_SESSION['mensaje'])):
    $mensaje = $_SESSION['mensaje'];
    unset($_SESSION['mensaje']);
?>
<script>
Swal.fire({
    title: '<?= $mensaje['titulo'] ?>',
    text: '<?= $mensaje['texto'] ?>',
    icon: '<?= $mensaje['icono'] ?>',
    confirmButtonText: 'Aceptar'
});
</script>
<?php endif; ?>
</body>
</html>