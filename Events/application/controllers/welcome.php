<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		$this->load->view('header');
		$this->load->view('Add_Event');

		// echo base_url();
	}
	public function addevent()
	{
		// echo $burl=base_url();
		$post= $this->input->post();
		$images=$post['nimg'];
		$address=$post['Address'];
		$latlong=$this->getLatLong($address);
		$post['Latitude']=$latlong['Lat'];
		$post['Longitude']=$latlong['Long'];
		$this->load->model('event_model');
		$this->event_model->add_event($images,$post);

		if($this->event_model->add_event($images,$post)){
			echo "<br><h1>Inserted</h1>";
			$this->listevent();
		}
		else{
			echo "<br><h1>ERROR</h1>";
		}
		
		// print_r( $post);
		// die;
	}

	public function listevent(){
		$this->load->model('event_model');
		$data['query']=$this->event_model->listevents();
		// print_r($data);
		echo json_encode($data);
		// $this->load->view('header');
		// $this->load->view('ListEvents',$data);
	}
	public function eventdetails(){
		parse_str($_SERVER['QUERY_STRING'],$_GET);
		// print_r($_GET);
		$id=$_GET['eventid'];
		
		$this->load->model('event_model');
		$data['query']=$this->event_model->eventdetails($id);
				echo json_encode($data);

		// $this->load->view('header');
		// $this->load->view('EventDetails',$data);
	}

	 public function getLatLong($location) {
	// $address = urlencode($location->getAddressLine1().' '.$location->getAddressLine2().' '.$location->getCity().' '.$location->getState().', '.$location->getCountry()) ;
	//33.7471045 , -117.8683609
	$address = urlencode($location) ;
	$url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=IND";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$response = curl_exec($ch);
	curl_close($ch);
	$response_a = json_decode($response);
	$lat = $response_a->results[0]->geometry->location->lat;
	$long = $response_a->results[0]->geometry->location->lng;
	$latlongArray = array('Lat' => $lat,'Long' => $long) ;
	return $latlongArray ;
}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */