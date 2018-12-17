<?php



	//función que llama al controlador y su respectiva acción, que son pasados como parámetros

	function call($controller, $action){

		//importa el controlador desde la carpeta Controllers

		require_once('controladores/' . $controller . 'Controlador.php');

		//crea el controlador

		switch($controller){

			case 'Usuarios':

				require_once('modelos/UsuariosModelo.php');

				$controller= new UsuariosControlador();

				break; 
				
				case 'Administrador':

				require_once('modelos/AdministradorModelo.php');

				$controller= new AdministradorControlador();

				break; 
                            
                                case 'Productos':

				require_once('modelos/ProductosModelo.php');

				$controller= new ProductosControlador();

				break; 
                            
                                case 'Pedidos':

				require_once('modelos/PedidosModelo.php');

				$controller= new PedidosControlador();

				break;
                            
                           


		}

		//llama a la acción del controlador

		$controller->{$action }();

	}



	//array con los controladores y sus respectivas acciones

	$controllers= array(

						'Usuarios'=>['cerrarSesion','index','registrar','actualizarUsuario','listarUsuarios','listarUsuarioId','modificarUsuario','darseBajaUsuario','crearUsuario','login','loguearse','bajaVista'],
                                                'Administrador'=>['index','listarUsuarios','listarUsuarioId','actualizarUsuario','modificarUsuario','bloquearUsuario','buscarUsuarios'],
                                                'Productos'=>['index','listarProductos','nuevoProducto','guardarProducto','modificarProducto','actualizarProducto','eliminarProducto','buscarProductos'],
                                                'Pedidos'=>['guardarPedido','eliminarPedido','actualizarPedido','confirmarPedido','listarPedidos','confirmarEliminarPedido'],
                                               

						);

	//verifica que el controlador enviado desde index.php esté dentro del arreglo controllers

	if (array_key_exists($controller, $controllers)) {

		//verifica que el arreglo controllers con la clave que es la variable controller del index exista la acción

		if (in_array($action, $controllers[$controller])) {

			//llama  la función call y le pasa el controlador a llamar y la acción (método) que está dentro del controlador

			call($controller, $action);

		}else{

			call('Usuarios', 'error');

		}

	}else{// le pasa el nombre del controlador y la pagina de error

		call('Usuarios', 'error');

	}

