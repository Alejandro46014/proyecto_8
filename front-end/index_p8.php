<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
	<!--<link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">-->
	
  
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	
	<?php
	$archivo=basename($_SERVER['PHP_SELF']);
	$pagina=str_replace(".php","",$archivo);
	
	if($pagina==='invitados' || $pagina==='index'){
		
		echo('<link rel="stylesheet" href="css/colorbox.css">');
	}elseif($pagina==='conferencias'){
		
		echo('<link rel="stylesheet" href="css/lightbox.css">');
	}
	?>
</head>

<body class="<?php echo($pagina); ?>">
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <header class="site-header">
	
	  <div class="contenido-header">
		
		 <img src="img/cabecera_patinetes.png" alt="Cabecera"/>
		 
	  </div><!--.contenido_header-->
	</header>

	<div class="barra">
		<div class="contenedor clearfix">
	
		<div class="menu-movil">
			<span></span>
			<span></span>
			<span></span>
		</div>
		<nav class="navegacion-principal">
			<a href="conferencias.php">Patinetes</a>
			<a href="calendario.php">Bicicletas</a> 
			<a href="invitados.php">SegWays</a> <a href="registro.php">NineBots</a> 
			<a href="registro.php">Monociclos</a>
			<a href="registro.php">HoverBoards</a> 
			<a class="user-icono" href="#"><i class="fas fa-user"></i><spam>Alejandro</spam></a></nav>
			<div class="extendido-usuarios">
				<a  href="#">Modificar perfil</a>
   				<a  href="#">Darse de baja</a>
    			<a  href="#">Cerrar sesión</a>
				
 			 </div>
	</div><!--.contenedor+clearfix-->
</div><!--.barra-->
		<!--Contenido principal-->
	
	<section class="seccion">
	
	 <div id="box">

    <?
    //bucle para ir sacando todos los productos
    ?>
    <div class="item_box">
      <img src="https://tecnocio.com/52379-large_default/patinete-electrico-urban-fox-rocks-x2.jpg"/>

      <div class="item_title">
        <span>Patinete lo que sea</span>
      </div>

      <div class="item_desc">
        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nibh leo, aliquet eu turpis a, sollicitudin mattis dui. Pellentesque sollicitudin pulvinar nulla id porta. Donec id massa eleifend, vestibulum sem quis, tincidunt dolor. In vitae est nec mi tristique aliquam. Donec porta ante id leo sollicitudin, ac volutpat justo lobortis.
        </span>
      </div>

      <div class="item_price">
        <span>Precio: xxx€</span>
      </div>
    </div>

    <div class="item_box">
      <img src="https://tecnocio.com/52379-large_default/patinete-electrico-urban-fox-rocks-x2.jpg"/>

      <div class="item_title">
        <span>Patinete lo que sea</span>
      </div>

      <div class="item_desc">
        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nibh leo, aliquet eu turpis a, sollicitudin mattis dui. Pellentesque sollicitudin pulvinar nulla id porta. Donec id massa eleifend, vestibulum sem quis, tincidunt dolor. In vitae est nec mi tristique aliquam. Donec porta ante id leo sollicitudin, ac volutpat justo lobortis.
        </span>
      </div>

      <div class="item_price">
        <span>Precio: xxx€</span>
      </div>
    </div>

    <div class="item_box">
      <img src="https://tecnocio.com/52379-large_default/patinete-electrico-urban-fox-rocks-x2.jpg"/>

      <div class="item_title">
        <span>Patinete lo que sea</span>
      </div>

      <div class="item_desc">
        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nibh leo, aliquet eu turpis a, sollicitudin mattis dui. Pellentesque sollicitudin pulvinar nulla id porta. Donec id massa eleifend, vestibulum sem quis, tincidunt dolor. In vitae est nec mi tristique aliquam. Donec porta ante id leo sollicitudin, ac volutpat justo lobortis.
        </span>
      </div>

      <div class="item_price">
        <span>Precio: xxx€</span>
      </div>
    </div>
		  <div class="item_box">
      <img src="https://tecnocio.com/52379-large_default/patinete-electrico-urban-fox-rocks-x2.jpg"/>

      <div class="item_title">
        <span>Patinete lo que sea</span>
      </div>

      <div class="item_desc">
        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nibh leo, aliquet eu turpis a, sollicitudin mattis dui. Pellentesque sollicitudin pulvinar nulla id porta. Donec id massa eleifend, vestibulum sem quis, tincidunt dolor. In vitae est nec mi tristique aliquam. Donec porta ante id leo sollicitudin, ac volutpat justo lobortis.
        </span>
      </div>

      <div class="item_price">
        <span>Precio: xxx€</span>
      </div>
    </div>
		  <div class="item_box">
      <img src="https://tecnocio.com/52379-large_default/patinete-electrico-urban-fox-rocks-x2.jpg"/>

      <div class="item_title">
        <span>Patinete lo que sea</span>
      </div>

      <div class="item_desc">
        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nibh leo, aliquet eu turpis a, sollicitudin mattis dui. Pellentesque sollicitudin pulvinar nulla id porta. Donec id massa eleifend, vestibulum sem quis, tincidunt dolor. In vitae est nec mi tristique aliquam. Donec porta ante id leo sollicitudin, ac volutpat justo lobortis.
        </span>
      </div>

      <div class="item_price">
        <span>Precio: xxx€</span>
      </div>
    </div>
		  <div class="item_box">
      <img src="https://tecnocio.com/52379-large_default/patinete-electrico-urban-fox-rocks-x2.jpg"/>

      <div class="item_title">
        <span>Patinete lo que sea</span>
      </div>

      <div class="item_desc">
        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nibh leo, aliquet eu turpis a, sollicitudin mattis dui. Pellentesque sollicitudin pulvinar nulla id porta.
			Donec id massa eleifend, vestibulum sem quis, tincidunt dolor. In vitae est nec mi tristique aliquam. Donec porta ante id leo sollicitudin, ac volutpat justo lobortis.
        </span>
      </div>

      <div class="item_price">
        <span>Precio: xxx€</span>
      </div>
			  
			  
			  
    </div>
		  <div class="item_box">
      <img src="https://tecnocio.com/52379-large_default/patinete-electrico-urban-fox-rocks-x2.jpg"/>

      <div class="item_title">
        <span>Patinete lo que sea</span>
      </div>

      <div class="item_desc">
        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nibh leo, aliquet eu turpis a, sollicitudin mattis dui. Pellentesque sollicitudin pulvinar nulla id porta. Donec id massa eleifend, vestibulum sem quis, tincidunt dolor. In vitae est nec mi tristique aliquam. Donec porta ante id leo sollicitudin, ac volutpat justo lobortis.
        </span>
      </div>

      <div class="item_price">
        <span>Precio: xxx€</span>
      </div>	  
    </div>
		 <div class="item_box">
      <img src="https://tecnocio.com/52379-large_default/patinete-electrico-urban-fox-rocks-x2.jpg"/>

      <div class="item_title">
        <span>Patinete lo que sea</span>
      </div>

      <div class="item_desc">
        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nibh leo, aliquet eu turpis a, sollicitudin mattis dui. Pellentesque sollicitudin pulvinar nulla id porta. Donec id massa eleifend, vestibulum sem quis, tincidunt dolor. In vitae est nec mi tristique aliquam. Donec porta ante id leo sollicitudin, ac volutpat justo lobortis.
        </span>
      </div>

      <div class="item_price">
        <span>Precio: xxx€</span>
      </div>
		 
		</div>
		</div>
	</section>
	
<!--FOOTER-->
	
	<footer class="site-footer">
		<div class="contenedor clearfix">
			<div class="footer-informacion">
			<h3>Sobre <span>BeLight</span></h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper dui ut nibh hendrerit aliquam. Donec iaculis metus et dignissim iaculis.</p>
			</div>
			<div class="ultimos-tweets">
			<h3>Ultimos <span>tweets</span></h3>
				<ul>
				<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper dui ut nibh hendrerit aliquam. Donec iaculis metus et dignissim iaculis.</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper dui ut nibh hendrerit aliquam. Donec iaculis metus et dignissim iaculis.</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla semper dui ut nibh hendrerit aliquam. Donec iaculis metus et dignissim iaculis.</li>
				</ul>
			</div>
			<div class="menu-footer">
			<h3>Redes <span>sociales</span></h3>
				<nav class="redes-sociales-footer">
		    <a href="#"><i class="fab fa-facebook-square" aria-hidden="true"></i></a>
			<a href="#"><i class=" fab fa-twitter-square" aria-hidden="true"></i></a>
			<a href="#"><i class="fab fa-pinterest-square" aria-hidden="true"></i></a>
			<a href="#"><i class="fab fa-youtube-square" aria-hidden="true"></i></a>
			<a href="#"><i class="fab fa-instagram-square" aria-hidden="true"></i></a>
			
		  </nav>
			</div>
		</div>
		<p class="copyright">Todos los derechos reservados 2018</p>
	</footer>
	
	
	
	<!--LINKADO DE JAVASCRIPT-->
	
  
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>
