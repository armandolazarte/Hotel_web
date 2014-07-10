<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articulo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
		//$this->load->library('image_CRUD');
	}

	public function _example_output($output = null)
	{
			$this->load->view('backend/head.php',$output);	
			$this->load->view('backend/inicio.php',$output);
	}
	
	public function _example_output2($output = null)
	{
			$this->load->view('backend/head.php',$output);
			$this->load->view('backend/inicio.php',$output);
			$this->load->view('backend/bienvenida.php',$output);
	}

	public function index()
	{
		$this->_example_output2((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	
	}


/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de artículos
 * 
 * ********************************************************************************
 **********************************************************************************/


	public function articulos_abm(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('articulos');
			
			$crud->columns(	'id_articulo',
							'titulo',
							'id_hotel',
							'id_categoria',
							'id_autor',
							'id_estado_articulo');
			
			$crud->display_as('id_articulo','ID')
				 ->display_as('titulo','Título')
				 ->display_as('id_hotel','Hotel')
				 ->display_as('id_categoria','Categoría')
				 ->display_as('id_autor','Autor')
				 ->display_as('id_estado_articulo','Estado')				 ;
			
			$crud->set_subject('artículo');
			
			$crud->set_relation('id_hotel','hoteles','hotel');
			$crud->set_relation('id_categoria','categorias','categoria');
			$crud->set_relation('id_autor','usuarios','usuario');
			$crud->set_relation('id_estado_articulo','estados_articulo','estado_articulo');
					
			$crud->required_fields('articulo','id_hotel','fecha_publicacion');
			
			$output = $crud->render();

			$this->_example_output($output);
	}
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de categorías
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function categorias_abm(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('categorias');
			
			$crud->columns(	'id_categoria',
							'categoria',
							'id_ubicacion',
							'id_estado_categoria');
			
			$crud->display_as('id_categoria','ID')
				 ->display_as('categoria','Categoría')
				 ->display_as('id_ubicacion','Ubicación')
				 ->display_as('id_estado_categoria','Estado');
			
			$crud->set_subject('categoría');
			
			$crud->set_relation('id_ubicacion','ubicacion','ubicacion');
			$crud->set_relation('id_estado_categoria','estados_categoria','estado_categoria');
					
			$crud->required_fields('categoria','id_ubicacion');
			
			$output = $crud->render();

			$this->_example_output($output);
	}
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de Estados Articulo
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function estados_articulo(){
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('estados_articulo');
			
			$crud->columns(	'id_estado_articulo',
							'estado_articulo');
			
			$crud->display_as('id_estados_articulo','ID')
				 ->display_as('estado_articulo','Estado');
			
			$crud->set_subject('estado');
			//$crud->unset_delete();
			//$crud->unset_export();
			//$crud->unset_add();
			
						
			$crud->required_fields('estado_articulo');
			
			$output = $crud->render();

			$this->_example_output($output);
	}

}