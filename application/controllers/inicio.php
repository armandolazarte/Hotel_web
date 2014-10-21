<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('hoteles_model');
		$this->load->model('articulos_model');
		$this->load->model('categorias_model');
		$this->load->model('direcciones_hotel_model');
		$this->load->model('imagenes_carrusel_model');
		$this->load->model('habitaciones_model');
		$this->load->model('configs_model');
		$this->load->model('tipos_habitacion_model');
		$this->load->model('configs_model');
		$this->load->helper('form');
		$this->load->helper('main');
		//$this->lang->load('english');
      	$this->load->helper('url');
	}
	
	
	public function index(){
		$db['hoteles']=$this->hoteles_model->getHotelesIntro();
		$db['direcciones']=$this->direcciones_hotel_model->getDirecciones();
		$db['texto']=$this->idiomas_model->getIdioma();
		
		$this->load->view('frontend/intro_carollo', $db);
	}
	

	public function hotel($id=NULL){
		if($id==NULL){
			redirect('','refresh');
		}else{
			$_COOKIE['id_hotel']=$id;
		}
		
		$db['texto']				= $this->idiomas_model->getIdioma();
		$db['idiomas']				= $this->idiomas_model->getIdiomas();
		$db['hoteles']				= $this->hoteles_model->getHoteles($_COOKIE['id_hotel']);
		$db['hoteles_menu']			= $this->hoteles_model->getHotelesAll();
		$db['emails_hotel']			= $this->hoteles_email_model->getEmails($_COOKIE['id_hotel']);
		$db['imagenes_carrusel']	= $this->imagenes_carrusel_model->getImagenes($_COOKIE['id_hotel']);
		$db['articulos']			= $this->articulos_model->getArticulos_paginaprincipal($_COOKIE['id_hotel']);
		$db['cantidad_categorias']	= count($db['articulos']);
		$db['configs']				= $this->configs_model->getConfigs();
		$db['configs_articulos']	= $this->configs_model->getConfigArticulos();
		$db['tipos_habitacion']		= $this->tipos_habitacion_model->getTipos();
		$db['categorias']			= $this->categorias_model->getCategorias($_COOKIE['id_hotel']);
		
		$this->load->view('frontend/head' , $db);
		$this->load->view('frontend/menu');
		$this->load->view('frontend/formulario_reserva');
		$this->load->view('frontend/carousel');
		//$this->load->view('frontend/hotel_descripcion');
		$this->load->view('frontend/banner');
		$this->load->view('frontend/footer');
	}

}
