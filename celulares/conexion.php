<?php
include 'estilos.php';
$servername = "127.0.0.1";
$database = "celulares";
$username = "root";
$password = "";
$codigo=$_POST['codigo'];
// Crear la conexion
$conn = mysqli_connect($servername, $username, $password, $database);
// Autenticación de la conexión
if (!$conn) {
    die("Servicio suspendido: " . mysqli_connect_error());
};
// Crear consulta SQL
$consulta="SELECT celulares.registro, celulares.marca, celulares.modelo, celulares.problema, celulares.fechaingreso, celulares.dni_cliente, cliente.nombre_cliente, cliente.apellido_cliente, celulares.idtecnico, tecnico.nombre_tecnico, tecnico.apellido_tecnico, tecnico.email_tecnico, celulares.estado, estado.descripcion, celulares.monto, celulares.fechaentrega from celulares join cliente on celulares.dni_cliente=cliente.dni join tecnico on celulares.idtecnico=tecnico.idtecnico join estado on celulares.estado=estado.idestado where celulares.registro = $codigo;";
$resultado=mysqli_query($conn,$consulta);
while($filas=mysqli_fetch_array($resultado)){
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <title>TecCellSoft | Estado del dispositivo</title>
</head>
<body>
<div class="tituloconexion">Seguimiento de estado del dispositivo N°: <?php echo $filas['registro']?></div>
<br>
<div class="div1">
    <table>
            <tr>
                <th>Registro</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Problema</th>
                <th>Fecha de ingreso</th>
            </tr>
            <tr>
                <td><?php echo $filas['registro'] ?></td>
                <td><?php echo $filas['marca'] ?></td>
                <td><?php echo $filas['modelo'] ?></td>
                <td><?php echo $filas['problema'] ?></td>
                <td><?php echo $filas['fechaingreso'] ?></td>
            </tr>
            <tr>
                <th>ID del estado del dispositivo</th>
                <th>Descripción</th>
                <th>Monto</th>
                <th>Fecha de entrega</th>
            </tr>
            <tr>
                <td><?php echo $filas['estado'] ?></td>
                <td><?php echo $filas['descripcion'] ?></td>
                <td><?php echo $filas['monto'] ?></td>
                <td><?php echo $filas['fechaentrega'] ?></td>
            </tr>
            <tr>
                <th>DNI del cliente</th>
                <th>Nombre</th>
                <th>Apellido</th>
            </tr>
            <tr>
                <td><?php echo $filas['dni_cliente'] ?></td>
                <td><?php echo $filas['nombre_cliente'] ?></td>
                <td><?php echo $filas['apellido_cliente'] ?></td>
            </tr>
            <tr>
                <th>ID del técnico a cargo</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
            </tr>
            <tr>
                <td><?php echo $filas['idtecnico'] ?></td>
                <td><?php echo $filas['nombre_tecnico'] ?></td>
                <td><?php echo $filas['apellido_tecnico'] ?></td>
                <td><?php echo $filas['email_tecnico'] ?></td>
            </tr>
    </table>
</div>
<?php
}?>
<?php
mysqli_close($conn);
?>
<br>
<footer><a href="contacto.html">Contacto</a></footer>
<br>
<footer><a href="index.html">Volver a la página principal</a></footer>
</body>
</html>