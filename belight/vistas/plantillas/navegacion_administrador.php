<div class="barra">
	  <div class="barra_contenedor clearfix">
	
		<div class="menu-movil">
			<span></span>
			<span></span>
			<span></span>
		</div>
		<nav class="navegacion-principal">
			<a href="?controller=Administrador&action=listarUsuarios">Gestionar usuarios</a>
			<a href="?controller=Productos&action=nuevoProducto">Nuevo producto</a> 
			<a href="?controller=Productos&action=listarProductos">Gestionar productos</a>
                        <a href="?controller=Pedidos&action=listarPedidosAdmin">Gestionar pedidos</a>
			
			
			<a class="user-icono enlace_usuarios" href="#"><i class="fas fa-user"></i><spam><?php echo($usuario->getTipoUsuario()->getTipoUsuario()); ?></spam></a>
			<div class="extendido-usuarios">
				<a  href="?controller=Usuarios&action=modificarUsuario&id=<?php echo($usuario->getIdUsuario()); ?>">Modificar perfil</a>
   				<a  href="?controller=Usuarios&action=darseBaja&id=<?php echo($usuario->getIdUsuario()); ?>">Darse de baja</a>
                                <a  href="?controller=Usuarios&action=cerrarSesion">Cerrar sesión</a>
    			</nav>
				
 			 </div>
	</div><!--.contenedor+clearfix-->
</div><!--.barra-->
<?php require_once 'controladores/ControladorFrontal.php';  ?>