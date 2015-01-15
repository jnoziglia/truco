<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Truco extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){	
		$this->db->select('*');
		$this->db->from('partidas');
		$this->db->where('jugador2', null);
		$data['partidas'] = $this->db->get()->result();
		$this->load->view('home', $data);
	}

	public function test($jugador, $partida_id)
	{	
		$this->load->helper('url');
		
		if($partida_id == 0){
			$insert2['fecha'] = '';
			$insert2['jugador1'] = 1;
			$this->db->insert('partidas', $insert2);
			$data['partida'] = $this->db->insert_id();
			$this->barajar($data['partida']);
		}else{
			$update['jugador2'] = 1;
			$this->db->where('id', $partida_id);
			$this->db->update('partidas', $update);
			$data['partida'] = $partida_id;
		}

		

		//echo $this->db->last_query();
		$this->load->view('testphp', $data);
	}


	public function guardarJugada(){
		
		$jugador = $this->input->post('jugador');

		$insert['carta_id'] = $this->input->post('carta_id');
		$insert['jugada'] = $this->input->post('jugada');
		$insert['partida'] = $this->input->post('partida');

		if ($jugador == 1){
			$this->db->insert('cartasJugador1', $insert);

			$update['estado'] = 1;
			$this->db->where('carta_id', $this->input->post('carta_id'));
			$this->db->update('manoj1', $update);
		}
		if ($jugador == 2){
			$this->db->insert('cartasJugador2', $insert);
			$update['estado'] = 1;
			$this->db->where('carta_id', $this->input->post('carta_id'));
			$this->db->update('manoj2', $update);
		}
	}

	public function cargarFelpudo($partida_id){
		$data = $this->Cartas->cargarFelpudo($partida_id);

		echo $this->db->last_query();
		$this->load->view('felpudo', $data);
	}

	public function cargarCartas($partida_id, $jugador){
		
		if($jugador == 1){
			$this->db->select('m.*, c.carta as cartaj1, c.palo as paloj1, c.valor as valorj1');
			$this->db->from('manoj1 m');	
			$this->db->join('cartas c', 'm.carta_id = c.id');
			$this->db->where('m.partida_id', $partida_id);
			$this->db->where('m.estado', 0);
			$data['cartasj1'] = $this->db->get()->result();
			$data['partida'] =$partida_id;
		}
		if($jugador == 2){
			$this->db->select('m.*, c.carta as cartaj1, c.palo as paloj1, c.valor as valorj1');
			$this->db->from('manoj2 m');	
			$this->db->join('cartas c', 'm.carta_id = c.id');
			$this->db->where('m.partida_id', $partida_id);
			$this->db->where('m.estado', 0);
			$data['cartasj1'] = $this->db->get()->result();
			$data['partida'] =$partida_id;
		}
		echo $this->db->last_query();
		$this->load->view('cartas-jugador', $data);

	}

	public function barajar ($partida_id){
		$this->db->select('*');
		$this->db->from('cartas');
		$this->db->order_by('id','RANDOM');
		$this->db->limit(6);
		$cartas  = $this->db->get()->result();
		
		$c = 0;	
		$jugador = array();
		foreach ($cartas as $carta) { 
				$insert['carta_id'] = $carta->id;
				$insert['estado'] = 0;
				$insert['partida_id'] = $partida_id;

			if($c <= 2){
				$this->db->insert('manoj1', $insert);
				//$jugador1[$c]['carta_id'] = $carta['id'];
			} 
			if($c > 2){
				$this->db->insert('manoj2', $insert);
				//$jugador2[$c-2] = $carta;
				echo $this->db->last_query();
			} 

			$c++;
		 }
	}


	public function pusher($partida_id){
		// How often to poll, in microseconds (1,000,000 μs equals 1 s)
		define('MESSAGE_POLL_MICROSECONDS', 500000);
		 
		// How long to keep the Long Poll open, in seconds
		define('MESSAGE_TIMEOUT_SECONDS', 30);
		 
		// Timeout padding in seconds, to avoid a premature timeout in case the last call in the loop is taking a while
		define('MESSAGE_TIMEOUT_SECONDS_BUFFER', 5);
		 
		// Hold on to any session data you might need now, since we need to close the session before entering the sleep loop
		//$user_id = $_SESSION['id'];
		 
		// Close the session prematurely to avoid usleep() from locking other requests
		//session_write_close();
		 
		// Automatically die after timeout (plus buffer)
		set_time_limit(MESSAGE_TIMEOUT_SECONDS+MESSAGE_TIMEOUT_SECONDS_BUFFER);
		 
		// Counter to manually keep track of time elapsed (PHP's set_time_limit() is unrealiable while sleeping)
		$counter = MESSAGE_TIMEOUT_SECONDS;
		 
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
		    // Send data to client; you may want to precede it by a mime type definition header, eg. in the case of JSON or XML
		    echo $data;
		}
	}

	public function getNewData($partida_id){

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */