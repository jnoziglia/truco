<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

  function __construct()
  {
    parent::__construct();

  }

  function index()
  {
    if($this->session->userdata('logged_in'))
    {
      $this->load->helper('url');
      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];
      $data['id'] = $session_data['id'];


      //traigo las partidas
      $data['partidas'] = $this->cartas->getPartidas();

      echo $this->db->last_query();
      $this->layout->view('home_view', $data);
    }else{
      //If no session, redirect to login page
      redirect('login', 'refresh');
	}
  }
  
  function logout()
  {
    $this->session->unset_userdata('logged_in');
    session_destroy();
    redirect('home', 'refresh');
  }

  public function crearPartida(){
    if($this->session->userdata('logged_in')){
        $this->load->helper('url');
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $user_id = $session_data['id'];
        $partida_id = $this->cartas->crearPartida($user_id);
        redirect('home/jugarPartida/'.$partida_id.'/'.$user_id);
       
       }else{
      //If no session, redirect to login page
      redirect('login', 'refresh');
  }
  }
  public function unirsePartida($partida_id,$user_id){
     if($this->session->userdata('logged_in')){
        $this->load->helper('url');
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];

        $update['jugador2'] = $user_id;
        $this->db->where('id', $partida_id);
        $this->db->update('partidas', $update);
        $data['partida_id'] = $partida_id;
       
       redirect('home/jugarPartida/'.$partida_id.'/'.$user_id);

    }else{
      //If no session, redirect to login page
      redirect('login', 'refresh');
  }


  }


public function jugarPartida($partida_id, $user_id){
    
    $data['cartas'] = $this->cartas->getCartas($partida_id, $user_id);
    $data['turno'] = $this->cartas->getTurno();
    $this->layout->view('juego', $data);
    
  }

 public function traerCartas($partida_id, $user_id){
  $data['cartas'] = $this->cartas->getCartas($partida_id, $user_id);
  $data['turno'] = $this->cartas->getTurno();
  //echo $this->db->last_query();
  $this->load->view('mis-cartas', $data);
 }
 public function getCartasTiradas(){
    $data['cartas1'] = $this->cartas->getCartasTiradas1();
    $data['cartas2'] = $this->cartas->getCartasTiradas2();
    $this->load->view('cartas-en-juego', $data);
 }

 public function tirarCarta(){
    $carta_id = $this->input->post('carta_id');
    $user_id = $this->input->post('user_id');
    $carta_mano_id = $this->input->post('carta_mano_id');
    $this->cartas->insertCarta($carta_id, $user_id, $carta_mano_id);
    $this->cartas->comprobarTurno();
 }

}

?>