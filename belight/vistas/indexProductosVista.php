<?php
      if(isset($_SESSION['usuario'])){
          session_start();
          $id=$_SESSION['usuario'];
          $usuario=new UsuariosModelo();
          $usuario=$usuario->getById($id);
          
          $numero_pedido=$_SESSION['num_pedido'];
      }
        
      ?>

<section class="seccion">
	
	 <div id="box">

    <?php foreach ($productos as $producto){ ?>
    <div class="item_box">
      <img src="<?php echo $producto->getImagenProducto();  ?>"/>

      <div class="item_title">
        <span><?php echo $producto->getNombreProducto();  ?></span>
      </div>

      <div class="item_desc">
        <span><?php echo $producto->getDescripcionProducto();  ?></span>
      </div>

      <div class="item_price">
        <span><?php echo $producto->getPrecioProducto(). "€"  ?></span>
      </div>
      <?php if($_SESSION['login']==true){ ?>
      <div class='item_desc'>
          <form action="?controller=Pedidos&action=confirmarPedido&id=<?php echo $producto->getIdProducto();?>" method="post">
              
              <div class="item_price">
                  <select name="cantidad_producto">
                      
                      <option value="" selected>Cantidad</option>
                      <?php $i=1;
                    while ($i<=11){
                        echo '<option value="'.$i.'">'.$i.'</option>';
                        
                        $i++;
                    }
                      ?>
                  </select>
              </div>
              
              <input type="hidden" name="id_usuario" value="<?php echo $usuario->getIdUsuario();  ?>"/>
               <input type="hidden" name="numero_pedido" value="<?php echo $numero_pedido;  ?>"/>
              
              <div class="col_formulario">
                  <input type="submit" class="buttom_green" value="Añadir al carrito" name="guardar_pedido"/>
              </div>
          </form>
      </div>
      <?php  } ?>
    </div><!--.item_box-->
    <?php }  ?>
</div>

