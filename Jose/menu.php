<?php
    include './header.php';
    include './conexion.php';
?>
<div class="text-center">
    <a href="/curso_php_nivel_3_20250901/Jose/">Ir al Inicio</a>
</div>
<h2 class="text-center">Agregar Usuarios</h2>
<form action="./validar.php" method="post">
    <div class="row col-md-12">
        <div class="col-md-4"></div>
        <div class="mb-3 mt-3 col-md-4">
            <label for="" class="form-label">Nombre y Apellido:</label>
            <input type="text" name="nombre_apellido" id="nombre_apellido" class="form-control" required>
            <label for="" class="form-label">Cédula:</label>
            <div class="input-group">
                <select name="documento" id="documento" class="form-control">
                    <option value="V">V</option>
                    <option value="E">E</option>
                    <option value="P">P</option>
                </select>
                <input type="text" name="cedula" id="cedula" class="form-control" required>
            </div>
            <label for="" class="form-label">Clave:</label>
            <input type="password" name="clave" id="clave" class="form-control" required>
            <label for="" class="form-label">Correo electrónico:</label>
            <input type="email" name="correo_electronico" id="correo_electronico" class="form-control" required>
            <div class="mt-3 text-center">
            <button type="submit" class="btn btn-success">Enviar</button>
            <button type="reset" class="btn btn-warning">Borrar</button>
            <input type="hidden" name="id" value="2">
            </div>
        </div>
    </div>
</form>

<?php
if ($_SESSION['tipo_usuario'] == 'ADMINISTRADOR'){
?>
    <hr>
    <h2 class="text-center">Agregar Productos</h2>
<!-- 
    atributos:
    method="post"
    enctype="multipart/form-data"
    Son requeridos en el formulario para efectuar la carga de archivos
-->
<form action="./validar.php" method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
        <label for="" class="form-label">Imagen:</label>
        <input type="file" name="archivo" id="archivo" class="form-control" required>
    </div>
    <div class="mb-3 mt-3">
        <label for="" class="form-label">Nombre producto:</label>
        <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" required>
    </div>
    <div class="mb-3 mt-3">
        <label for="" class="form-label">Precio:</label>
        <input type="number" name="precio" id="precio" class="form-control" min="0" step="0.01" required>
    </div>
    <div class="mb-3 mt-3">
        <label for="" class="form-label">Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" class="form-control" min="0" required>
    </div>
    <div class="mb-3 mt-3">
        <label for="" class="form-label">Descripción:</label>
        <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
    </div>
    <div class="mb-3 mt-3 text-center">
        <button type="submit" class="btn btn-success">Enviar</button>
        <button type="reset" class="btn btn-warning">Borrar</button>
        <input type="hidden" name="id" value="3">
    </div>
</form>
<?php

echo "<hr>";
echo "<h2 class='text-center'>Reporte de Ventas</h2>";
$sql = "SELECT * FROM reporte_de_ventas";
$resultado = mysqli_query($enlace, $sql);
echo "<table class='table table-bordered table-hover'>";
echo "<thead>
     <tr>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Total</th>
        <th>Fecha y Hora</th>
     </tr>
     </thead>";
echo "<tbody>";
    while ($data = mysqli_fetch_array($resultado)){
        echo "<tr>";
            echo "<td>" . $data['nombre_apellido'] . "</td>";
            echo "<td>" . $data['cantidad'] . "</td>";
            echo "<td>" . number_format($data['total'],2,',','.') . "</td>";
            echo "<td>" . $data['fecha_hora'] . "</td>";
        echo "</tr>";
    };
echo "</tbody>";
echo "</table>";
echo "<hr>" . "<br>";
}
?>
<?php
    include './footer.php';
?>

