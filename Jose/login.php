<?php
    include './header.php';
?>
    <h2 class="text-center">Validar usuarios</h2>
    <form action="./validar.php" method="post">
        <div class="row col-md-12">
            <div class="col-md-4"></div>
            <div class="mb-3 mt-3 col-md-4">
                <label for="" class="form-label">Correo Electrónico:</label>
                <input type="email" name="correo_electronico" id="correo_electronico" class="form-control" required>
                <label for="" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <div class="mt-3" style="text-align:center;">
                <button type="submit" class="btn btn-success">Enviar</button>
                <button type="reset" class="btn btn-warning">Borrar</button>
                
                <input type="hidden" name="id" value="1">
                
                <div class="mt-3">
                    <a href="">Usuarios no registrados</a>
                </div>
                <div class="mt-3">
                    <a href="/curso_php_nivel_3_20250901/Jose/">Ir al Inicio</a>
                </div>
                </div>
            </div>
        </div>
    </form>
<?php
    include './footer.php';
?>

