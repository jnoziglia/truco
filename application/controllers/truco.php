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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */