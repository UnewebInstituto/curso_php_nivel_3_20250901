<?php
    include './header.php';
?>
    <br>
    <h4 class="text-center">Ingreso</h4>
    <form action="./validar.php" method="post">
        <div class="row col-md-12">
            <div class="col-md-4"></div>
            <div class="mb-3 mt-3 col-md-4">
                <input type="hidden" name="id" value="1">
                <label for="" class="form-label">Correo Electrónico:</label>
                <input type="email" name="correo_electronico" id="correo_electronico" class="form-control" required>
                <label for="" class="form-label">Contraseña:</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <div class="mt-3" style="text-align:center;">
                <button type="submit" class="btn btn-primary btn-sm">Ingresar</button>
                <button type="reset" class="btn btn-secondary btn-sm">Borrar</button>
                <div class="mt-3">
                    <a href="./menu.php">Usuario no registrado</a>
                </div>
                <div class="mt-3">
                    <a href="/curso_php_nivel_3_20250901/navileth/">Ir al inicio</a>
                </div>
                </div>
            </div>
        </div>
    </form>

<?php
    include './footer.php';
?>

