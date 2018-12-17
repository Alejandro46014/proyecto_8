<!--CONTENIDO-->
<section class="seccion">

	<div class="formulario_small clearfix">
	<div class="cabecera_formularios">
		<h3>¿Realmente desea eliminar este pedido??</h3>
		<form action="?controller=Pedidos&action=eliminarPedido&id=<?php echo $pedido->getIdPedido(); ?>" method="post">
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

