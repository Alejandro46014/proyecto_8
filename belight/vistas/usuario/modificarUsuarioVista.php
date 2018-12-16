<?php $apellidos=explode(" ", $usuario->getApellidosUsuario()); ?>
<section class="seccion">
   
<div class="formulario clearfix">
    <div class="cabecera_formularios">
        <h3>Modificar perfil</h3>
    <form method="post" action="?controller=Usuarios&action=actualizarUsuario&id=<?php echo $usuario->getIdUsuario();  ?>">
        </div>
    <div class="col_2_formulario">
    
           <label for="nombre">* Nombre: <input type="text" name="nombre_usuario" required="true" id="nombre" value="<?php echo $usuario->getNombreUsuario(); ?>"/></label>
    </div>
    <div class="col_2_formulario">
    
            <label for="apellidos1"> * Primer apellido: <input type="text"  name="apellido1_usuario" required="true" id="apellidouno" value="<?php echo $apellidos[0]; ?>"/></label>
   </div>
   <div class="col_2_formulario">
    
            <label for="apellido2"> Segundo apellido: <input type="text" name="apellido2_usuario" id="apellidodos" value="<?php echo $apellidos[1]; ?>"/></label>
    </div>
        <div class="col_2_formulario">
    
           <label for="email"> * Correo electrónico: <input type="email" name="email_usuario" required="true" id="email" value="<?php echo $usuario->getEmailUsuario(); ?>"/></label>
    </div>
    <div class="col_2_formulario">
    
           <label for="password"> * Contraseña: <input type="password" name="password_usuario" required="true" id="password" value="<?php echo $usuario->getPasswordUsuario(); ?>" title="La contraseña debe contener mayúsculas minúsculas, numeros y tener una longitud de 8 caracteres"/></label>
           
    </div>
   <div class="col_2_formulario">
    
       <label for="rpassword"> * Repite contraseña: <input type="password" name="rpassword" required="true" id="rpassword" placeholder="ej: Masdem22" value="<?php echo $usuario->getPasswordUsuario(); ?>"/></label>
</div>
    
    <div class="col_2_formulario">
    
        <label for="dni"> * DNI: <input type="text" name="dni_usuario" required="true" id="dni" value="<?php echo $usuario->getDniUsuario(); ?>"></label>
</div>
    
    <div class="col_2_formulario">
    
        <label for="telefono"> Nº telefono: <input type="tel" name="telefono_usuario" id="telefono" value="<?php echo $usuario->getDireccionUsuario()->getTelfUsuario(); ?>"/></label>
</div>
    
    <div class="col_formulario">
        
        <h4>Dirección</h4>
    </div>
    
    <div class="col_4_formulario">
    
   <label for="calle"> * Calle: <input type="text" name="calle_usuario" required="true" id="calle" value="<?php echo $usuario->getDireccionUsuario()->getCalleUsuario(); ?>"/></label>
</div>
    
    <div class="col_4_formulario">
    
   <label for="n_calle"> * Numero de portal: <input type="text" name="n_calle_usuario" required="true" id="n_calle" value="<?php echo $usuario->getDireccionUsuario()->getNCalleUsuario(); ?>"/></label>
</div>
    
    <div class="col_4_formulario">
    
   <label for="escalera">  Escalera: <input type="text" name="escalera_usuario"  id="escalera" value="<?php echo $usuario->getDireccionUsuario()->getEscaleraUsuario(); ?>"/></label>
</div>
    
    <div class="col_4_formulario">
    
        <label for="cp"> * Código postal: <input type="text" name="cp_usuario" required="true" id="cp" value="<?php echo $usuario->getDireccionUsuario()->getCpUsuario(); ?>"/>
</div>
    
    <div class="col_3_formulario">
    
   <label for="ciudad">  Ciudad: <input type="text" name="ciudad_usuario"  id="ciudad" value="<?php echo $usuario->getDireccionUsuario()->getCiudadUsuario(); ?>"/></label>
</div>
    
    <div class="col_3_formulario">
    
   <label for="poblacion"> * Población: <input type="text" name="poblacion_usuario" required="true" id="poblacion" value="<?php echo $usuario->getDireccionUsuario()->getPoblacionUsuario(); ?>"/></label>
</div>

   <div class="col_3_formulario">
    
           <label for="pais"> * Pais: <input type="text" name="pais_usuario" id="pais" value="<?php echo $usuario->getDireccionUsuario()->getPaisUsuario(); ?>"/></label>
    </div>
        
        <div class="col_formulario">
            
            <input class="buttom_green" type="submit" value="Darse de alta" />
        
       <div class="leyenda">
           <spam>* Los campos marcados con este símbolo son obligatorios</spam>
       </div>  
        </div>

    </form>
</div>
    

</section>