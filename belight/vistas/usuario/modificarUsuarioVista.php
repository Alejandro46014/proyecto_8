<?php  require_once("includes/header.php"); ?>

<?php  require_once("includes/navegacion_administrador.php"); ?>

<!--CONTENIDO-->

<section class="seccion">
<div class="formulario clearfix">
	<div class="cabecera_formularios">
		<h3>Modificar usuario</h3>
	<form method="post" action="?controller=Usuario&action=actualizarUsuario&id=<?php //echo $usuario->getIdUsuario(); ?>">
		</div>
	<div class="col_2_formulario">
	
            <label for="nombre">Nombre<input type="text" name="nombre_usuario" id="nombre" value="<?php //echo $usuario->getNombreUsuario(); ?>"/></label>
	</div>
	<div class="col_2_formulario">
	
             <label for="apellidos">Apellidos<input type="text" name="apellidos_usuario" id="apellidos" value="<?php //echo $usuario->getApellidosUsuario(); ?>"/></label>
	</div>
		<div class="col_2_formulario">
	
            <label for="email">Correo electrónico<input type="email" name="email_usuario" id="email" value="<?php //echo $usuario->getEmailUsuario(); ?>"/></label>
	</div>
		<div class="col_2_formulario">
	
            <label for="pais">Pais<input type="text" name="pais_usuario" id="pais" value="<?php //echo $usuario->getPaisUsuario(); ?>"/></label>
	</div>
		<div class="col_2_formulario">
	
            <label for="fecha_nacimiento">Fecha de nacimiento<input type="date" name="fecha_nacimiento_usuario" id="fecha_nacimiento" value="<?php //echo $usuario->getFechaNacimientoUsuario(); ?>"/></label>
	</div>
		<?php if($usuario->getTipoUsuario()->getTipoUsuario()=="Usuario_novel"){  ?>
		<div class="col_2_formulario">
		<label for="tipo_usuario" >Tipo Usuario:<br>
                <select name="tipo_usuario" class="tipo_usuario">
                    <option value="">--Tipo usuario--</option>
                    <option value="2" selected>Usuario novel</option>
                    <option value="3">Usuario experto</option>
                    <option value="4">Usuario profesional</option>
                    
                </select>
            </label>
			<?php }elseif($usuario->getTipoUsuario()->getTipoUsuario()=="Usuario_experto"){  ?>
			
			<label for="tipo_usuario" >Tipo Usuario:<br>
                <select name="tipo_usuario" class="tipo_usuario">
                    <option value="">--Tipo usuario--</option>
                    <option value="2">Usuario novel</option>
                    <option value="3" selected>Usuario experto</option>
                    <option value="4">Usuario profesional</option>
                    
                </select>
            </label>
			
			<?php }elseif($usuario->getTipoUsuario()->getTipoUsuario()=="Usuario_profesional"){  ?>
			
			<label for="tipo_usuario" >Tipo Usuario:<br>
                <select name="tipo_usuario" class="tipo_usuario">
                    <option value="">--Tipo usuario--</option>
                    <option value="2">Usuario novel</option>
                    <option value="3">Usuario experto</option>
                    <option value="4" selected>Usuario profesional</option>
                    
                </select>
            </label>
			
			<?php  } ?>
		</div>
		<div class="col_formulario">
			<input type="submit" name="actualizar" value="Actualizar" class="buttom_green"/>
		</div>	
	</div>

</section>

<?php require_once("includes/footer.php");  ?>
          