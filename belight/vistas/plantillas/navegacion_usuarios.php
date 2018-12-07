
<div class="barra">
		<div class="contenedor clearfix">
	
		<div class="menu-movil">
			<span></span>
			<span></span>
			<span></span>
		</div>
		<nav class="navegacion-principal">
			<a href="?controller=Productos&action=index&id=1">Acción</a>
			<a href="?controller=Productos&action=index&id=2">Terror</a> 
			<a href="?controller=Productos&action=index&id=3">Románticas</a> 
			<a href="?controller=Productos&action=index&id=4">Infantiles</a> 
			<a href="?controller=Productos&action=index&id=5">Comedia</a>
			<a href="?controller=Productos&action=index&id=6">Ciencia-ficción</a> 
			<a href="?controller=Productos&action=index&id=7">Drama</a> 
			<a href="?controller=Productos&action=index&id=8">Musicales</a> 
			<a class="user-icono" href="#"><i class="fas fa-user"></i><spam><?php echo $usuario->getNombreUsuario();  ?></spam></a></nav>
			<div class="extendido-usuarios">
				<a  href="#">Modificar perfil</a>
   				<a  href="#">Darse de baja</a>
                                <a  href="#">Cerrar sesión</a>
				
 			 </div>
	</div><!--.contenedor+clearfix-->
</div><!--.barra-->
<?php echo $usuario->getNombreUsuario();
require_once 'controladores/ControladorFrontal.php';  ?>