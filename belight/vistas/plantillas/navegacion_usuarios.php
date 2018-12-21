
<div class="barra">
		<div class="contenedor clearfix">
	
		<div class="menu-movil">
			<span></span>
			<span></span>
			<span></span>
		</div>
		<nav class="navegacion-principal">
			<a href="?controller=Productos&action=index&id=1">Patinetes</a>
			<a href="?controller=Productos&action=index&id=2">Bicicletas</a> 
			<a href="?controller=Productos&action=index&id=3">SegWays</a> 
                        <a href="?controller=Productos&action=index&id=4">NineBots</a>
			<a href="?controller=Productos&action=index&id=5">HoverBoards</a> 
			<a class="user-icono enlace_usuarios" href="#"><i class="fas fa-user"></i><spam><?php echo $usuario->getNombreUsuario();  ?></spam></a>
               
		<div class="extendido-usuarios">
			<a  href="?controller=Usuarios&action=modificarUsuario&id=<?php echo($usuario->getIdUsuario()); ?>">Modificar perfil</a>
   			<a  href="?controller=Usuarios&action=bajaVista&id=<?php echo $usuario->getIdUsuario(); ?>">Darse de baja</a>
    			<a  href="?controller=Usuarios&action=cerrarSesion">Cerrar sesión</a>
                        <a  href="?controller=Pedidos&action=listarPedidos&id=<?php echo $usuario->getIdUsuario(); ?>">Pedidos</a>
				
                </div>
                </nav>
	</div><!--.contenedor+clearfix-->
</div><!--.barra-->

<?php require_once 'controladores/ControladorFrontal.php';  ?>