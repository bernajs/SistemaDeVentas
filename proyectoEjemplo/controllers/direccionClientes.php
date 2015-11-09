<?php
	namespace controllers;	
	use libs\Controller;

	class direccionClientes extends Controller {

		public function __construct(){
			parent::__construct();
			
		}

		/*public function listarInventario(){
			$this->view->render(explode("\\", get_class($this))[1], "listar", $this->getErrores);
		}*/

		public function guardarDireccion($params=array()){
			//Llamando al metodo del modelo
			if(isset($params['ciudad']) && isset($params['cp']) && isset($params['colonia']) && isset($params['calle']) && isset($params['numero']) && isset($params['detalle']) && isset($params['CLIENTE_dni'])){
				$this->crearInventario($params);
			}
			//Renderizando la vista asociada
			$this->view->render(explode("\\",get_class($this))[1], "guardar",$this->getErrores());
		}

		public function crearInventario($params){
			
		    $nombre = $params['nombre'];
		    $aPaterno = $params['aPaterno'];
		    $aMaterno = $params['aMaterno'];
		    $fechaNacimiento = $params['fechaNacimiento'];
		    //$DIRECCION_idDireccion=$params['DIRECCION_idDireccion'];

		    /*if(!is_numeric($dia)){
		        $this->errores['dia']="Oye el dia no es un numero, no seas bobo chico";
		        
		    }
		    
		    if(!is_numeric($demanda)){
		        $this->errores['demanda']="Oye la demanda no es un numero, no seas bobo chico";
		        
		    }

		    if(!is_numeric($produccion)){
		        $this->errores['produccion']="Oye la produccion no es un numero, analiza";
		        
		    }*/

		    if(count($this->errores) ==0 ){
		    	try{
		        	$this->model->crearInventario($nombre, $aPaterno, $aMaterno, $fechaNacimiento/*,$DIRECCION_idDireccion*/);
		    	}
		    	catch(\Exception $e){
					$this->errores['global']=$e->getMessage();
				}
		    }
				
		}
	}

?>