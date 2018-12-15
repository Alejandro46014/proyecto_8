<?php
      if(isset($_SESSION['usuario'])){
          session_start();
          $id=$_SESSION['usuario'];
          $usuario=new UsuariosModelo();
          $usuario=$usuario->getById($id);
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
          <a href='?controller=Pedidos&action=guardarPedido&id=<?php echo $producto->getIdProducto();?>&usuario=<?php echo $usuario->getIdUsuario();  ?>' class='buttom_green'>Valorar</a>
    </div>
      <?php  } ?>
    </div><!--.item_box-->
    <?php }  ?>
</div>

