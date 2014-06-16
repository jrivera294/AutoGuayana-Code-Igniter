<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Error de registro</title>
<!-- Bootstrap core CSS -->
    <link href="<?= base_url("assets/css/bootstrap.min.css");?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url("assets/css/custom.css");?>" rel="stylesheet">
</head>
<body>
     <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= base_url();?>index.php/">AutoGuayana</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?= base_url();?>index.php/clientes">Clientes</a></li>
            <li><a href="<?= base_url();?>index.php/stock">Stock</a></li>
            <li><a href="<?= base_url();?>index.php/facturar">Facturar</a></li>
            <li><a href="<?= base_url();?>index.php/administracion">*Administración*</a></li>
          </ul>
        </div>
      </div>
    </div>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


    <h2 class="sub-header">Error al registrar</h2>
    <div class="alert alert-danger">
        <strong>
        <?php
            if(strpos($message,"dom_nombre_check")){
                echo "Nombres y apellidos deben tener la primera letra mayúscula y las demás en minúsculas";
            }else if(strpos($message,"dom_fecha_nac")){
                echo "Error en fecha de nacimiento. No puedes registrar a alguien que no ha nacido!";
            }else if(strpos($message,"estatustrab_check")){
                echo "Error en el estatus del trabajador, solo puede ser Activo,Permiso,Retirado,Vacaciones";
            }else if(strpos($message,"cliente_pkey")){
                echo "Error: ya existe un cliente con ésta cédula";
            }else{
                echo $message;
            }
        ?>
        </strong>
    </div>

    <a href="javascript:history.go(-1)" class="btn btn-sm btn-primary" role="button">Volver</a>
</div>

</body>
</html>
