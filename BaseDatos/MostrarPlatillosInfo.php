<?php
include "conexionBD.php";
include "consultasBD.php";
$conexion=conectar();
$respuesta="
<div class='container'>
 <input type='hidden' name='idsodaG' id='idsodaG' value='".$_POST['id']."'/>
<label class='control-label' for='nombre'><h3><strong>Agregar un nuevo platillo</strong></h3></label>
<div class='panel panel-default'>
 <div class='panel-body'>
 <form class='form-horizontal' role='form' id='formNuevoPlatillo'>
 <input type='hidden' name='idsoda' id='idsoda' value='".$_POST['id']."'/>
 <div class='form-group'>
    <label class='control-label col-sm-2' for='nombre'>Nombre:</label>
     <div class='col-sm-10'>
        <input style='font-size:15px;' type='text' class='form-control inputlg' placeholder='Vacio' maxlength='45' id='nombreplatillo' name='nombreplatillo' required/>
        </div>
         <div class='col-sm-10'>
         <label>Desea escoger uno platillo anterior?</label>
        <input type='checkbox' onchange='cambiarEstado();' value='si' id='si' name='si'/>
        </div>
         <div class='col-sm-10'>
        <select class='form-control' id='nombreselect' name='nombreselect'>".RetornaComboBoxPlatillos(traerPlatillosPorSodaGroupBy($_POST['id']), $conexion,0)."</select> 
        </div>
  </div>
  <div class='form-group'>
    <label class='control-label col-sm-2' for='correo'>Precio:</label>
    <div class='col-sm-10'>
    <input type='text' placeholder='Vacio' class='form-control' maxlength='45' id='precio' name='precio' required/>
    </div>
  </div>
  <div class='form-group'>
    <label class='control-label col-sm-2' for='descripcion'>Descripcion:</label>
    <div class='col-sm-10'>
    <textarea placeholder='Vacio' class='form-control' maxlength='45' id='descripcion' name='descripcion' rows='5' required></textarea>
    </div>
  </div>
  <div class='form-group'>
    <label class='control-label col-sm-2' for='dia'>D&iacute;a:</label>
    <div class='col-sm-10'>
    <input type='date'  class='form-control'  id='dia' name='dia' required/>
    </div>
  </div>
  <div class='col-sm-offset-2 col-sm-10'>
    <button type='submit' class='btn btn-warning' name='nuevoPlatillo' id='nuevoPlatill'>Agregar</button>
    </div>
</form>";

$respuesta.="<div class='container'>
<label class='control-label' for='nombre'><h3><strong>Platillos existentes </strong></h3>*Se recomienda dejar al menos un platillo de cada tipo</label>
<div class='panel panel-default'>
 <div id='divtablaPlatillos' class='panel-body'>".RetornaTablaPlatillos(traerPlatillosPorSoda($_POST['id']), $conexion);
echo $respuesta;
