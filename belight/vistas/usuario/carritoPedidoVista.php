<section class="seccion">
    <div class="resumen clearfix">
        
        <form method="post" action="?controller=Pedidos&action=guardarPedido">
            <input type="hidden" name="id_usuario" value="<?php echo $pedido->getIdUsuario();  ?>"/>
            <input type="hidden" name="id_producto" value="<?php echo $pedido->getIdProducto();  ?>"/>
            <input type="hidden" name="numero_pedido" value="<?php echo $pedido->getNumeroPedido();  ?>"/>
            <input type="hidden" name="cantidad_producto" value="<?php echo $pedido->getCantidadProducto();  ?>"/>
            <input type="hidden" name="total_pedido" value="<?php echo $pedido->getTotalPedido();  ?>"/>
          
            
            <div class="datos_producto">
         
                <img src="<?php echo $producto->getImagenProducto();  ?>" alt="<?php echo $producto->getNombreProducto();  ?>"/>
                <div class="producto">
                    
                    <h4><?php echo $producto->getNombreProducto(); ?></h4>
                </div>
            </div>
            
            <div class="datos_usuario">
                <div class="usuario">
                    
                    
                </div>  
                <div class="usuario">
                    
                    
                </div>  
                
            </div>
            <div class="datos_pedido">
                <h4>Numero de pedido: <?php echo $pedido->getNumeroPedido(); ?></h4>
                <div class="pedido">
                    <ul>
                        <li>Cantidad: <?php echo $pedido->getCantidadProducto(); ?></li>
                        <li>Precio: <?php echo $producto->getPrecioProducto(); ?></li>
                        <li>Total: <?php echo $pedido->getTotalPedido(); ?></li>
                    </ul>
                </div>
            </div>
            
        
        </form>
    </div>
    
    
</section>


