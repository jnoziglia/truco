<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

  function __construct()
  {
    parent::__construct();
		$this->load->helper('url');
		$this->load->library('tank_auth');
  }

  
function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['user_id'] = $this->tank_auth->get_user_id();
			$data['username'] = $this->tank_auth->get_username();
			$data['partidas'] = $this->cartas->getPartidas();
			$this->layout->view('home_view', $data);
		}
	}

  public function crearPartida(){

        $user_id = $this->tank_auth->get_user_id();
        $partida_id = $this->cartas->crearPartida($user_id);
        $this->cartas->setTurno($user_id);
        redirect('home/jugarPartida/'.$partida_id.'/'.$user_id);
    
  }
  public function unirsePartida($partida_id,$user_id){
    
        $update['jugador2'] = $user_id;
        $this->db->where('id', $partida_id);
        $this->db->update('partidas', $update);
        $data['partida_id'] = $partida_id;
       
       redirect('home/jugarPartida/'.$partida_id.'/'.$user_id);

  }


public function jugarPartida($partida_id, $user_id){
    $data['cartas'] = $this->cartas->getCartas($partida_id, $user_id);
    $data['turno'] = $this->cartas->getTurno();
    $this->layout->view('juego', $data);
    
  }

 public function traerCartas($partida_id, $user_id){
  $data['cartas'] = $this->cartas->getCartas($partida_id, $user_id);
  $data['turno'] = $this->cartas->getTurno();
  $data['partida'] = $partida_id;
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
    $usuario = $this->cartas->comprobarTurno($user_id);
    //echo $this->db->last_query();
    $this->cartas->setTurno($usuario);
  	//pusher
  	require_once('lib/Pusher.php');

  	$pusher = new Pusher(APP_KEY, APP_SECRET, APP_ID);

  	$message = "Tu turno";
  	$data = array('message' => $message);

  	$pusher->trigger('my_notifications', 'notification', $data);

 }



}

?>