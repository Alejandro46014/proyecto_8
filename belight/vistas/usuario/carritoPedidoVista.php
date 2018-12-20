<section class="seccion">
    <div class="resumen clearfix">
        
        <form method="post" action="?controller=Pedidos&action=guardarPedido">
            <input type="hidden" name="id_usuario" value="<?php echo $pedido->getIdUsuario();  ?>"/>
            <input type="hidden" name="id_producto" value="<?php echo $pedido->getIdProducto();  ?>"/>
            <input type="hidden" name="numero_pedido" value="<?php echo $pedido->getNumeroPedido();  ?>"/>
            <input type="hidden" name="cantidad_producto" value="<?php echo $pedido->getCantidadProducto();  ?>"/>
            <input type="hidden" name="total_pedido" value="<?php echo $pedido->getTotalPedido();  ?>"/>
          
            
            <div class="datos_producto">
                <div class="imagen">
                <img src="<?php echo $producto->getImagenProducto();  ?>" alt="<?php echo $producto->getNombreProducto();  ?>"/>
                </div>
                <div class="producto">
                    
                    <h4><?php echo $producto->getNombreProducto(); ?></h4>
                </div>
            </div>
            
            <div class="datos_usuario clearfix">
                <div class="usuario">
                    <h4>Datos personales</h4>
                    <ul>
                        <li>Nombre: <?php echo $usuario->getNombreUsuario(). " ".$usuario->getApellidosUsuario(); ?></li>
                        <li>Nº teléfono: <?php echo $usuario->getDireccionUsuario()->getTelfUsuario(); ?></li>
                    </ul>
                    
                </div>  
                <div class="usuario">
                    
                    <h4>Dirección</h4>
                    <ul>
                        <li>Calle: <?php echo $usuario->getDireccionUsuario()->getCalleUsuario(); ?></li>
                        <li>Nº calle: <?php echo $usuario->getDireccionUsuario()->getNCalleUsuario(); ?></li>
                        <li>Escalera: <?php echo $usuario->getDireccionUsuario()->getEscaleraUsuario(); ?></li>
                        <li>Código postal: <?php echo $usuario->getDireccionUsuario()->getCpUsuario(); ?></li>
                        <li>Población: <?php echo $usuario->getDireccionUsuario()->getPoblacionUsuario(); ?></li>
                        <li>Ciudad: <?php echo $usuario->getDireccionUsuario()->getCiudadUsuario(); ?></li>
                        <li>País: <?php echo $usuario->getDireccionUsuario()->getPaisUsuario(); ?></li>
                    </ul>
                    
                </div>  
                
            </div>
            <div class="datos_pedido">
                <h4>Numero de pedido: <?php echo $pedido->getNumeroPedido(); ?></h4>
                <div class="pedido">
                    <ul>
                        <li>Fecha: <?php echo $pedido->getFechaPedido()->format('Y-m-d H:i:s'); ?></li>
                        <li>Cantidad: <?php echo $pedido->getCantidadProducto(); ?></li>
                        <li>Precio: <?php echo $producto->getPrecioProducto()."€"; ?></li>
                        <li>Total: <?php echo $pedido->getTotalPedido()."€"; ?></li>
                    </ul>
                </div>
            </div>
            <div class="col_formulario">
                <input type="submit" name="confirmar_carrito" value="Confirmar" class="buttom_green"/>
            </div>
             <div class="col_formulario">
                <input type="submit" name="vaciar_carrito" value="Cancelar" class="buttom_red"/>
            </div>
        
        </form>
    </div>
    
    
</section>


