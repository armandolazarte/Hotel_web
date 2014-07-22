<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('menu');
		$this->load->library('grocery_CRUD');
		//$this->load->library('image_CRUD');
	}


	public function _example_output($output = null)
	{
		$reservas=buscarReservas();
		$mensajes=buscarMensajes();
		
		$db=array_merge($reservas, $mensajes);
					
		$this->load->view('backend/head.php',$output);
		$this->load->view('backend/menu.php', $db);	
		$this->load->view('backend/modal.php');
		$this->load->view('backend/hoteles.php');
		$this->load->view('backend/footer.php');
	}
	
	public function index()
	{
		$this->_example_output2((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	
	}


/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de hoteles
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function hoteles_abm(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('hoteles');
			
			$crud->columns(	'id_hotel',
							'hotel',
							'descripcion',
							'logo_url',
							'url');
			
			$crud->display_as('id_hotel','ID')
				 ->display_as('hotel','Hotel')
				 ->display_as('descripcion','Descripción')
				 ->display_as('url','Sitio');
			
			$crud->set_subject('hotel');
			
			$crud->required_fields('hotel','descripcion', 'url');
			
			$crud->add_action('Teléfono', '', '','fa fa-phone', array($this,'buscar_telefonos'));
			$crud->add_action('Email', '', '','icon-emailalt', array($this,'buscar_emails'));
			$crud->add_action('Dirección', '', '','icon-homealt', array($this,'buscar_direcciones'));
			$crud->add_action('Configuración', '', '','icon-mootools', array($this,'buscar_config'));
			
			$crud->set_field_upload('logo_url','assets/uploads/logos');
			
			$output = $crud->render();

			$this->_example_output($output);
			
	}
	
		
	

/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de teléfonos
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function telefonos_hotel($id=NULL){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			
			if(isset($id)){
				$crud->where('telefonos_hotel.id_hotel',$id);
			}
			
			$crud->set_table('telefonos_hotel');
			
			$crud->columns(	'id_hotel',
							'telefono',
							'id_tipo');
			
			$crud->display_as('id_hotel','Hotel')
				 ->display_as('telefono','Teléfono')
				 ->display_as('id_tipo','Tipo');
			
			$crud->set_subject('teléfono');
			
			$crud->set_relation('id_hotel','hoteles','hotel');
			$crud->set_relation('id_tipo','tipos','tipo');
			
			$crud->required_fields(	'id_hotel',
									'telefono');
			
			$output = $crud->render();

			$this->_example_output($output);
	}	
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de Emails
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function emails_hotel($id=NULL){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			
			if(isset($id)){
				$crud->where('emails_hotel.id_hotel',$id);
			}
			
			$crud->set_table('emails_hotel');
			
			$crud->columns(	'id_hotel',
							'email',
							'id_tipo');
			
			$crud->display_as('id_hotel','Hotel')
				 ->display_as('email','Email')
				 ->display_as('id_tipo','Tipo');
			
			$crud->set_subject('email');
			
			$crud->set_relation('id_hotel','hoteles','hotel');
			$crud->set_relation('id_tipo','tipos','tipo');
			
			$crud->required_fields(	'id_hotel',
									'email');
			
			$output = $crud->render();

			$this->_example_output($output);
	}
	
	
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de Direcciones
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function direcciones_hotel($id=NULL){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			
			if(isset($id)){
				$crud->where('direcciones_hotel.id_hotel',$id);
			}
			
			$crud->set_table('direcciones_hotel');
			
			$crud->columns(	'id_hotel',
							'calle',
							'nro',
							'id_departamento',
							'id_provincia');
			
			$crud->display_as('id_hotel','Hotel')
				 ->display_as('id_departamento','Dep.')
				 ->display_as('id_provincia','Prov.')
				 ->display_as('id_pais','País');
			
			$crud->set_subject('dirección');
			
			$crud->set_relation('id_hotel','hoteles','hotel');
			$crud->set_relation('id_departamento','departamentos','departamento');
			$crud->set_relation('id_provincia','provincias','provincia');
			$crud->set_relation('id_pais','paises','pais');
			
			$crud->required_fields(	'id_hotel',
									'calle',
									'nro',
									'id_provincia');
			
			$output = $crud->render();

			$this->_example_output($output);
	}	
	

/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de Config
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function config($id=NULL){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			
			if(isset($id)){
				$crud->where('config.id_hotel',$id);
			}
			
			$crud->set_table('config');
			
			$crud->columns(	'id_hotel',
							'css',
							'mostrar_tarifa');
			
			$crud->display_as('id_hotel','Hotel')
				 ->display_as('css','Estilo')
				 ->display_as('mostrar_tarifa','Tarifas');
			
			$crud->set_subject('config');
			
			$crud->set_relation('id_hotel','hoteles','hotel');
			
			$crud->required_fields(	'id_hotel',
									'css',
									'mostrar_tarifa');
			
			$output = $crud->render();

			$this->_example_output($output);
	}	
		

/**********************************************************************************
 **********************************************************************************
 * 
 * 				Alta, baja y modificación de Detalle
 * 
 * ********************************************************************************
 **********************************************************************************/
 
 
	public function detalle_config(){
			$crud = new grocery_CRUD();

			//$crud->set_theme('datatables');
			$crud->set_table('detalles_config');
			
			$crud->columns(	'id_config',
							'id_categoria',
							'usar');
			
			$crud->display_as('id_config','Config')
				 ->display_as('id_categoria','Categoria')
				 ->display_as('usar','Usar');
			
			$crud->set_subject('detalle');
			
			$crud->set_relation('id_config','config','id_config');
			$crud->set_relation('id_categoria','categorias','categoria');
			
			$crud->required_fields(	'id_config',
									'id_categoria',
									'usar');
			
			$output = $crud->render();

			$this->_example_output($output);
	}	
		
/**********************************************************************************
 **********************************************************************************
 * 
 * 				Funciones
 * 
 * ********************************************************************************
 **********************************************************************************/

	public function buscar_telefonos($id){
		$query = $this->db->query("SELECT * FROM telefonos_hotel WHERE id_hotel='$id' ");
		
		if($query->num_rows() > 0){
			return site_url('/admin/hotel/telefonos_hotel').'/'.$id;	
		}else{
			return site_url('admin/hotel/telefonos_hotel/add').'/'.$id;;
		}
	}



	public function buscar_emails($id){
		$query = $this->db->query("SELECT * FROM emails_hotel WHERE id_hotel='$id' ");
		
		if($query->num_rows() > 0){
			return site_url('/admin/hotel/emails_hotel').'/'.$id;	
		}else{
			return site_url('admin/hotel/emails_hotel/add').'/'.$id;;
		}
	}



	public function buscar_direcciones($id){
		$query = $this->db->query("SELECT * FROM direcciones_hotel WHERE id_hotel='$id' ");
		
		if($query->num_rows() > 0){
			return site_url('/admin/hotel/direcciones_hotel').'/'.$id;	
		}else{
			return site_url('admin/hotel/direcciones_hotel/add').'/'.$id;;
		}
	}
	
	
	
	public function buscar_config($id){
		$query = $this->db->query("SELECT * FROM config WHERE id_hotel='$id' ");
		
		if($query->num_rows() > 0){
			return site_url('/admin/hotel/config').'/'.$id;	
		}else{
			return site_url('admin/hotel/config/add').'/'.$id;;
		}
	}


}