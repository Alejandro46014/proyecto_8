<section class="seccion">

    <div class="lista_usuarios">
	<div class="tabla">
		
		<table class="tabla">
	
	<tr>
		<th>Id pedido</th>
		<th>Numero de pedido</th>
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
                                <td><?php echo $producto->getNombreProducto(); ?></td>
				<td><?php echo $producto->getPrecioProducto()."€";?></td>
				<td><?php echo $pedido->getCantidadProducto();?></td>
                                <td><?php echo $pedido->getTotalPedido()."€";?></td>
		
				
				<td><a href="?controller=Pedidos&action=ConfirmarEliminarPedido&id=<?php echo $pedido->getNumeroPedido(); ?>">Eliminar</a> </td>
				
			</tr>
			
	<?php } ?>
</table>
		</div>
	</div>
	
	</section><!--fin contenido-->