<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <script type="text/javascript" src="validar_usuarios.js"></script>
    <script type="text/javascript" src="validar_usuarios.js"></script>

    <title>CuentaAdmin</title>
</head>
<body style="background: linear-gradient(to right, #34495e, #ebedef);">
    

<?php
include ('Conectate.php');
$mailAdmin=$_POST["mail"];
$pwAdmin=$_POST["pw"];

$consulta = mysqli_query($conexion,"SELECT * FROM usuarios");
$nssrepetido=false;
$fila;
while($fila = mysqli_fetch_array($consulta)){
 if($mailAdmin ==  $fila['Correo'] && $pwAdmin == $fila["Contra"] && $fila["Tip_User"]==1) {  //Datos del Admin
    $nssrepetido=true;
    break;
 }
}

if($nssrepetido){
//Agregar nuevo registro
?>
<div class="mx-auto card" style="width: 30%; background-color: rgba(86,61,124,.15);">
<h5 class="card-header info-color white-text text-center py-10 bg-primary">
    <strong>Agregar usuario</strong>
</h5>
<div class="card-body px-lg-5">
    <form name="formul" action="add_user.php" method="POST">
            <div class="md-form mb-5">
                <i class="fas fa-id-card prefix black-text"></i>
                <input type="text" placeholder="NSS"name="defaultForm_NSS" class="form-control validate">
            </div>

        <div class="md-form mb-4">
            <i class="fas fa-portrait prefix black-text"></i>
            <label data-error="wrong" data-success="right">Nombre</label>
            <input type="text" name="defaultForm_name" class="form-control validate">
        </div>

        <div class="md-form mb-4">
            <i class="fas fa-calendar-alt prefix black-text"></i>
            <input type="date" placeholder="Fecha de Nacimiento"name="defaultForm_fecha" class="form-control validate">
        </div>

        <div class="md-form mb-4">
            <i class="fas fa-envelope prefix black-text"></i>
            <input type="email" name="Correo" class="form-control validate"placeholder="Correo" >
        </div>

        <div class="md-form mb-4">
            <i class="fas fa-lock prefix black-text"></i>
            <input type="password" name="defaultForm_pw" class="form-control validate" placeholder="Contraseña">
        </div>

        <select name="type_user"class="mdb-select md-form colorful-select dropdown-primary form-control validate">
            <option value="">Puesto de Usuario</option>
            <option value="1">Admin</option>
            <option value="2">Checador</option>
            <option value="3">Ingeniero civil</option>
            <option value="4">Transportista</option>
            <option value="5">Control de obra</option>
        </select>

        <select name="status"class="mdb-select md-form colorful-select dropdown-primary form-control validate">
            <option value="">Status de Usuario</option>
            <option value="1">Activo</option>
            <option value="2">En proceso</option>
            <option value="0">Inactivo</option>
        </select>
        <button type="button"class="btn btn-danger form-control" id="boton">Registrar</button>
    </form>  
</div>
</div>   
<?php
}
else{
    echo "Datos erroneos.<br>Solo el Admin puede registrar usuarios";
?>
<form action="usuarios.php">
    <button class="btn btn-primary"> Aceptar</button>
</form>
<?php
}
$conexion->close();
?>


<!-- jQuery -->
<script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript"></script>

</body>
 </html>   