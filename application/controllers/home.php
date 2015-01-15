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

 public function pusher($partida_id){
    // How often to poll, in microseconds (1,000,000 μs equals 1 s)
    define('MESSAGE_POLL_MICROSECONDS', 500000);
     
    // How long to keep the Long Poll open, in seconds
    define('MESSAGE_TIMEOUT_SECONDS', 30);
     
    // Timeout padding in seconds, to avoid a premature timeout in case the last call in the loop is taking a while
    define('MESSAGE_TIMEOUT_SECONDS_BUFFER', 5);
     
    // Hold on to any session data you might need now, since we need to close the session before entering the sleep loop
    $user_id = $_SESSION['id'];
     
    // Close the session prematurely to avoid usleep() from locking other requests
    session_write_close();
     
    // Automatically die after timeout (plus buffer)
    set_time_limit(MESSAGE_TIMEOUT_SECONDS+MESSAGE_TIMEOUT_SECONDS_BUFFER);
     
    // Counter to manually keep track of time elapsed (PHP's set_time_limit() is unrealiable while sleeping)
    $counter = MESSAGE_TIMEOUT_SECONDS;

    // hay cambios???
    $this->hayCambios($partida_id); 

    // Poll for messages and hang if nothing is found, until the timeout is exhausted
    while($counter > 0)
    {
        // Check for new data (not illustrated)
        if($data = getNewData($partida_id))
        {
            // Break out of while loop if new data is populated
            break;
        }
        else
        {
            // Otherwise, sleep for the specified time, after which the loop runs again
            usleep(MESSAGE_POLL_MICROSECONDS);
     
            // Decrement seconds from counter (the interval was set in μs, see above)
            $counter -= MESSAGE_POLL_MICROSECONDS / 1000000;
        }
    }
     
    // If we've made it this far, we've either timed out or have some data to deliver to the client
    if(isset($data))
    {
        // Send data to client; you may want to precede it by a mime_content_type(filename)e type definition header, eg. in the case of JSON or XML
        echo $data;
    }
 }

 public function getNewData($partida_id){

 }

 public function hayCambios($partida_id){
    $cartas1 = count($this->cartas->getCartasTiradas1());
    $cartas2 = count($this->cartas->getCartasTiradas2());
 }

}

?>