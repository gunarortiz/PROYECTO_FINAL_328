<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

       public function __construct(){
              parent::__construct();
              $this->load->model("Principal_model");
          }
   
	public function index()
	{
              $rep = $this->Principal_model->listado();
              $datos["reporte"]=$rep;

       $this->load->view('plantilla/cabecera');
       $this->load->view('plantilla/menuizquierdo');
       $this->load->view('principal_view', $datos);
       $this->load->view('plantilla/pie');
	}
}
