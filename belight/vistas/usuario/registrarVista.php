
<section class="seccion">
    
<div class="formulario clearfix">
    <div class="cabecera_formularios">
        <h3>Formulario de alta en la web</h3>
    <form method="post" action="?controller=Usuarios&action=crearUsuario">
        </div>
    <div class="col_2_formulario">
    
           <label for="nombre">* Nombre: <input type="text" name="nombre_usuario" required="true" id="nombre" value="<?php echo $_POST["nombre_usuario"]; ?>"/></label>
    </div>
    <div class="col_2_formulario">
    
            <label for="apellidos1"> * Primer apellido: <input type="text"  name="apellido1_usuario" required="true" id="apellidouno" value="<?php echo $_POST["apellido1_usuario"]; ?>"/></label>
   </div>
   <div class="col_2_formulario">
    
            <label for="apellido2"> Segundo apellido: <input type="text" name="apellido2_usuario" id="apellidodos" value="<?php echo $_POST["apellido2_usuario"]; ?>"/></label>
    </div>
        <div class="col_2_formulario">
    
           <label for="email"> * Correo electrónico: <input type="email" name="email_usuario" required="true" id="email" value="<?php echo $_POST["email_usuario"]; ?>"/></label>
    </div>
    <div class="col_2_formulario">
    
        <label for="password"> * Contraseña: <input type="password" name="password_usuario" required="true" id="password" placeholder="ej: Masdem22" value="<?php echo $_POST["password_usuario"]; ?>" title="La contraseña debe contener mayúsculas minúsculas, numeros y tener una longitud de 8 caracteres"/></label>
           
    </div>
   <div class="col_2_formulario">
    
   <label for="rpassword"> * Repite contraseña: <input type="password" name="rpassword" required="true" id="rpassword"></label>
</div>
    
    <div class="col_2_formulario">
    
        <label for="dni"> * DNI: <input type="text" name="dni_usuario" required="true" id="dni" value="<?php echo $_POST["dni_usuario"]; ?>"></label>
</div>
    
    <div class="col_2_formulario">
    
        <label for="telefono"> Nº telefono: <input type="tel" name="telefono_usuario" id="telefono" value="<?php echo $_POST["telefono_usuario"]; ?>"/></label>
</div>
    
    <div class="col_formulario">
        
        <h4>Dirección</h4>
    </div>
    
    <div class="col_3_formulario">
    
   <label for="calle"> * Calle: <input type="text" name="calle_usuario" required="true" id="calle"></label>
</div>
    
    <div class="col_3_formulario">
    
   <label for="n_calle"> * Numero de portal: <input type="text" name="n_calle_usuario" required="true" id="n_calle"></label>
</div>
    
    <div class="col_3_formulario">
    
   <label for="escalera">  Escalera: <input type="text" name="escalera_usuario"  id="escalera"></label>
</div>
    <div class="col_3_formulario">
    
   <label for="cp">  Código postal: <input type="text" name="cp_usuario"  id="cp"></label>
</div>
    
    <div class="col_3_formulario">
    
   <label for="ciudad">  Ciudad: <input type="text" name="ciudad_usuario"  id="ciudad"></label>
</div>
    
    <div class="col_3_formulario">
    
   <label for="poblacion"> * Población: <input type="text" name="poblacion_usuario" required="true" id="poblacion"></label>
</div>

   <div class="col_3_formulario">
    
           <label for="pais"> * Pais: <input type="text" name="pais_usuario" id="pais" value="<?php echo $_POST["pais_usuario"]; ?>"/></label>
    </div>
        
        <div class="col_formulario">
            
            <input class="buttom_green" type="submit" value="Darse de alta" />
        
       <div class="leyenda">
           <spam>* los campos marcados con este símbolo son obligatorios</spam>
       </div>  
        </div>

    </form>
</div>
   

</section>