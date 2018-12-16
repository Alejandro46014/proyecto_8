


<section class="seccion">
	<div class="formulario clearfix">
		<form action="?controller=Administrador&action=buscarUsuarios" method="post">
		<div class="col_3_formulario">
                    
			<label for="id_usuario">Id usuario:<br> <input type="number" id="id_usuario" name="id_usuario"/></label>
		</div>
                    
		<div class="col_3_formulario">
                    
                    <label for="nombre_usuario">Nombre usuario:<br> <input type="text" id="id_usuario" name="nombre_usuario"/></label>
		</div>
                    
		<div class="col_3_formulario ">
		
                    <label for="pais_usuario">País usuario:<br> <input type="text" id="pais_usuario" name="pais_usuario"/></label>
                
                </div>
		
                    <div class="col_formulario">
				<input type="submit" name="buscar" value="Buscar" class="buttom_green"/>
			</div>
		</form>
	</div>
	<div class="lista_usuarios">
	<div class="tabla">
		
		<table class="tabla">
	
	<tr>
		<th>Id</th>
		<th>Nombre</th>
		<th>Apellidos</th>
		<th>Email</th>
		<th>DNI</td>
		<th>Tipo usuario</th>
                <th>País</th>
		<th>Ciudad</th>
		<th>Población</th>
		<th>Calle</th>
                <th>Nº calle</th>
		<th>Escalera</th>
		<th>Código postal</th>
		<th>Telefono</th>
		
		<th colspan=2 >Acciones</th>
	</tr>
<?php foreach ($usuarios as $usuario) { ?>
		
			<tr>
				<td><?php echo $usuario->getIdUsuario(); ?></td>
				<td><?php echo $usuario->getNombreUsuario(); ?></td>
				<td><?php echo $usuario->getApellidosUsuario(); ?></td>
				<td><?php echo $usuario->getEmailUsuario();?></td>
				<td><?php echo $usuario->getDniUsuario();?></td>
				<td><?php echo $usuario->getTipoUsuario()->getTipoUsuario();?></td>
                                <td><?php echo $usuario->getDireccionUsuario()->getPaisUsuario();?></td>
				<td><?php echo $usuario->getDireccionUsuario()->getCiudadUsuario();?></td>
				<td><?php echo $usuario->getDireccionUsuario()->getPoblacionUsuario();?></td>
				<td><?php echo $usuario->getDireccionUsuario()->getCalleUsuario();?></td>
                                <td><?php echo $usuario->getDireccionUsuario()->getNCalleUsuario();?></td>
				<td><?php echo $usuario->getDireccionUsuario()->getEscaleraUsuario();?></td>
				<td><?php echo $usuario->getDireccionUsuario()->getCpUsuario();?></td>
                                <td><?php echo $usuario->getDireccionUsuario()->getTelfUsuario();?></td>
				
				
				<td><a href="?controller=Usuarios&action=bajaVista&id=<?php echo $usuario->getIdUsuario(); ?>">Eliminar</a> </td>
				<td><a href="?controller=Pedidos&action=listarPedidos&id=<?php echo $usuario->getIdUsuario(); ?>">Gestionar pedidos</a> </td>
			</tr>
			
	<?php } ?>
</table>
		</div>
	</div>
	
	</section><!--fin contenido-->
	
	
	
	
