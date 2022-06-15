<main class="contenedor seccion" >
        <h1>Actualizar Vendedor(a)</h1>

        <!--Imprime los errores-->
        <?php foreach($errores as $error):?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <form class="formulario" method="POST">
            <?php include __DIR__ . '/formulario.php' ?>
            <input type="submit" class="boton boton-verde" value="Actualizar Vendedor(a)">
        </form>
    </main>