<?php
    include './header.php';
?>
    <h2>Validar usuarios</h2>
    <form action="" method="post">
        <div class="mb-3 mt-3">
            <label for="" class="form-label">Correo Electrónico:</label>
            <input type="email" name="correo_electronico" id="correo_electronico" class="form-control" required>
        </div>
        <div class="mb-3 mt-3">
            <label for="" class="form-label">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-3 mt-3">
            <button type="submit" class="btn btn-success">Enviar</button>
            <button type="reset" class="btn btn-warning">Borrar</button>
        </div>
    </form>
<?php
    include './footer.php';
?>

