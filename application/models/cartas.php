<?php
class Cartas extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    public function getPartidas(){
    	$this->db->select('*');
    	$this->db->where('jugador2', null);
    	$this->db->from('partidas');
    	$partidas = $this->db->get();
    	return $partidas->result();
    }

    public function crearPartida($user_id){
    	$insert['fecha'] = '';
		$insert['jugador1'] = $user_id;
		$this->db->insert('partidas', $insert);
		$partida_id = $this->db->insert_id();
		$this->resetearMano();
		$this->barajar($partida_id);
		return $partida_id;
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
			} 
			if($c > 2){
				$this->db->insert('manoj2', $insert);				
			} 

			$c++;
		 }
	}

	public function getCartas($partida_id, $user_id){
		$this->db->select('m.id as mano_id, m.id as carta_mano_id, m.carta_id as carta_id, m.partida_id as partida_id, c.carta as carta, c.palo as palo, c.valor as valor');
		if($user_id == 1){
			$this->db->from('manoj1 m');
		}
		
		if($user_id == 2){
			$this->db->from('manoj2 m');
		}
		$this->db->join('cartas c', 'm.carta_id = c.id');
		$this->db->where('m.partida_id', $partida_id);
		$this->db->where('m.estado', 0);
		$cartas = $this->db->get();
		return $cartas->result();
	}

	public function getCartasTiradas1(){
		$this->db->select('ct.carta_id as carta_id, c.*');
		$this->db->from('cartas_tiradas1 ct');
	
		$this->db->join('cartas c', 'ct.carta_id = c.id');
		$cartas1 = $this->db->get();
		//echo $this->db->last_query();
		return $cartas1->result();
	}

	public function getCartasTiradas2(){
		$this->db->select('ct.carta_id as carta_id, c.*');
		$this->db->from('cartas_tiradas2 ct');
	
		$this->db->join('cartas c', 'ct.carta_id = c.id');
		$cartas2 = $this->db->get();
		//echo $this->db->last_query();
		return $cartas2->result();
	}

	public function insertCarta($carta_id, $user_id, $carta_mano_id){
		//seteo la carta como tirada en la tabla de mano
		$update['estado'] = 1;
		$this->db->where('id', $carta_mano_id);
		if($user_id == 1){
			$this->db->update('manoj1', $update);
		}
		if($user_id == 2){
			$this->db->update('manoj2', $update);
		}
		
		//seteo el turno
		$update2['user_id'] = $user_id;
		$this->db->where('id', 1);
		$this->db->update('turno', $update2);

		//select cartas en mano
		$this->db->select('ct.*');
		$this->db->where('ct.carta_id !=', 0);
		if($user_id ==1){
			$this->db->from('cartas_tiradas1 ct');
		}
		else{
			$this->db->from('cartas_tiradas2 ct');
		}

		$cartasTiradas = $this->db->get()->result();
		$cantCartas = count($cartasTiradas) + 1;

		//update la carta en  cartas tiradas =)
		$update3['carta_id'] = $carta_id;
		$this->db->where('id', $cantCartas);
		if($user_id == 1){
			$this->db->update('cartas_tiradas1', $update3);
		}
		if($user_id == 2){
			$this->db->update('cartas_tiradas2', $update3);
		}
		
	}

	public function getTurno(){
		$this->db->select('*');
		$this->db->from('turno');
		$this->db->where('id', 1);
		$turno = $this->db->get();
		//echo $this->db->last_query();
		return $turno->row();
	}

	public function setTurno($user_id){
		$update['user_id'] = $user_id;
		$this->db->update('turno', $update);
	}
	
	public function resetearMano(){
		$update['carta_id'] = 0;
		$this->db->update('cartas_tiradas1', $update);
		$this->db->update('cartas_tiradas2', $update);
	}

	public function comprobarTurno(){
		
	}
}

?>