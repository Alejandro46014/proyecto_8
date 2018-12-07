
<section class="seccion">
<div class="formulario clearfix">
	<div class="cabecera_formularios">
		<h3>Formulario modificacion usuario</h3>
	<form method="post" action="?controller=Usuario&action=actualizarUsuario&id=<?php echo $usuario->getIdUsuario(); ?>">>
		</div>
	<div class="col_2_formulario">
	
            <label for="nombre">* Nombre: <input type="text" name="nombre_usuario" id="nombre" value="<?php echo $usuario->getNombreUsuario(); ?>"/></label>
	</div>
	<div class="col_2_formulario">
	
             <label for="apellidos"> * Primer apellido: <input type="text" name="apellido1" id="apellidouno" value="<?php echo $usuario->getApellidosUsuario(); ?>"/></label>
    </div>
    <div class="col_2_formulario">
	
             <label for="apellidos"> Segundo apellido: <input type="text" name="apellido2" id="apellidodos" value="<?php echo $usuario->getApellidosUsuario(); ?>"/></label>
	</div>
		<div class="col_2_formulario">
	
            <label for="email"> * Correo electrónico: <input type="email" name="email_usuario" id="email" value="<?php echo $usuario->getEmailUsuario(); ?>"/></label>
	</div>
	<div class="col_2_formulario">
	
            <label for="password"> * Contraseña: <input type="password" name="password_usuario" id="password" value="<?php echo $usuario->getpasswordUsuario(); ?>"/></label>
	</div>
    <div class="col_2_formulario">
	
    <label for="rpassword"> * Repite contraseña: <input type="password" name="rpassword_usuario" id="rpassword"></label>
</div>
    
    
    <div class="col_2_formulario">
	
            <label for="pais"> * Pais: <input type="text" name="pais_usuario" id="pais" value="<?php echo $usuario->getPaisUsuario(); ?>"/></label>
	</div>
		<div class="col_2_formulario">
	
            <label for="fecha_nacimiento"> * Fecha de nacimiento: <input type="date" name="fecha_nacimiento_usuario" id="fecha_nacimiento" value="<?php echo $usuario->getFechaNacimientoUsuario(); ?>"/></label>
	</div>
		<div class="col_formulario">
			
			<input class="buttom_green" type="submit" name="actualizar" value="Actualizar datos" />
		</div>
        <div class="leyenda">
        <small>* los campos marcados con este símbolo son obligatorios</</small>
        </div>	

	</form>
 </div>
	</div>

    
 </div>
</section>