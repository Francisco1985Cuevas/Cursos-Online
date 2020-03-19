<!-- <h1>PRUEBA DE CARGA VISTA INICIO</h1> -->

<?php require RUTA_APP . '/vistas/inc/header.php'; ?>




<p><?php echo $datos['titulo']; ?></p>
<ul>
    <?php foreach ($datos['articulos'] as $articulo) : ?>
        <li><?php echo $articulo->titulo; ?></li>
    <?php endforeach; ?>
</ul>

    
    
    
<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>

<!-- <p><?php echo RUTA_APP; ?></p> -->
