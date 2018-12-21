<section class="seccion">

    <div class="formulario clearfix">
		<form action="?controller=Pedidos&action=buscarPedidos" method="post">
		<div class="col_3_formulario">
			<label for="id_pedido">Id pedido:<br> <input type="number" id="id_pedido" name="id_pedido"/></label>
		</div>
                    <div class="col_3_formulario">
                        <label for="id_usuario">Id usuario:<br> <input type="number" id="id_usuario" name="id_usuario"/></label>
		</div>
		<div class="col_3_formulario">
                    <label for="numero_pedido">Numero de pedido:<br> <input type="number" id="numero_pedido" name="numero_pedido"/></label>
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
		<th>Id pedido</th>
		<th>Numero de pedido</th>
                <th>Fecha de pedido</th>
		<th>Nombre producto</th>
		<th>Precio producto</th>
		<th>Cantidad</th>
                <th>Total pedido</th>
		
		
		<th >Acciones</th>
	</tr>
<?php foreach ($pedidos as $pedido) { 
    
    $producto=new ProductosModelo();
    $producto=$producto->getById($pedido->getIdProducto());
            
    ?>
		
			<tr>
				<td><?php echo $pedido->getIdPedido(); ?></td>
				<td><?php echo $pedido->getNumeroPedido(); ?></td>
                                <td><?php echo $pedido->getFechaPedido()->format('Y-m-d H:i:s '); ?></td>
                                <td><?php echo $producto->getNombreProducto(); ?></td>
				<td><?php echo $producto->getPrecioProducto()."€";?></td>
				<td><?php echo $pedido->getCantidadProducto();?></td>
                                <td><?php echo $pedido->getTotalPedido()."€";?></td>
		
				
				<td><a href="?controller=Pedidos&action=confirmarEliminarPedido&id=<?php echo $pedido->getIdPedido(); ?>">Eliminar</a> </td>
				
			</tr>
			
	<?php } ?>
</table>
		</div>
	</div>
	
	</section><!--fin contenido-->