<?php require_once("includes/header.php");  ?>

<?php require_once("includes/navegacion_administrador.php");  ?>


<!--CONTENIDO-->
<section class="seccion">

	<div class="formulario_small clearfix">
	<div class="cabecera_formularios">
		<h3>¿Realmente desea darse de baja??</h3>
		<form action="?controller=Usuarios&action=darseBajaUsuario&id=<?php //echo $usuario->getIdUsuario(); ?>" method="post">
		<div class="col_formulario">
			<input type="submit" name="aceptar" class="buttom_green" value="Aceptar"/>
			</div>
			<div class="col_formulario">
			<input type="submit" name="cancelar" class="buttom_red" value="Cancelar"/>
			</div>
		</form>
		</div>
	</div>
</section>


<?php require_once("includes/footer.php");  ?>