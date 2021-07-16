<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function narsisticNumber($number)
	{
		$narsisNumber = $number;
		$sumNarsis = 0;
		$numlength = strlen((string)$number);
		
		for($i=0;$i<$numlength;$i++){
			$sumNarsis = $sumNarsis+(pow($number[$i],$numlength));
			
		}

		$data = array(
			'title' => 'Narsistic Number',
			'input' => $number,			
			'message' => 'My Message'
		);
		
		if($narsisNumber == $sumNarsis){
			$data['message'] = "TRUE";
			$this->load->view('welcome_message',$data);
		}else{
			$data['message'] = "FALSE";
			$this->load->view('welcome_message',$data);
		}
		
	}		

	public function parityOutlier(){		
		$numbers = array(2, 4, 0, 100, 4, 11, 2602, 36);
		$this->testOutlier($numbers);
	}

	public function testOutlier($numbers){
		
		$countNumbers = count($numbers);

		$oddSize = 0;
		$evenSize = 0;

		$oddData = 0;
		$evenData = 0;
		foreach ($numbers as $value) {
			if($value%2==0){
				$evenData = $value;
				$evenSize++;
			}else{
				$oddData = $value;
				$oddSize++;
			}
		}

		$data = array(
			'title' => 'PARITY OUTLIER',
			'input' => "",			
			'message' => 'My Message'
		);				

		if($countNumbers == $oddSize){
			$data['message'] = "ALL ODD";
						
		}
		if($countNumbers == $evenSize){			
			$data['message'] = "ALL EVEN";			
		}
		
		if($oddSize > $evenSize){
			$data['message'] = $oddData." (the only odd number)";
		}else{
			$data['message'] = $evenData." (the only even number)";
		}
		$this->load->view('welcome_message',$data);
	}

	public function findNeedle(){		
		$colors = array("red","blue","yellow");
		$this->testNeedle($colors, "blue");
	}

	public function testNeedle($colors, $search){
		$index = "";
		for ($i=0; $i<count($colors); $i++) {
			if($colors[$i] == $search){
				$index = $i;
				break;
			}
		}

		$data = array(
			'title' => 'NEEDLE IN THE HAYSTACK',
			'input' => "",			
			'message' => 'My Message'
		);

		if($index != ""){
			$data['message'] = $index." as the index of the needle (".$search.")";
		}else{
			$data['message'] = "Search not found";
		}
		
		$this->load->view('welcome_message',$data);
	}

	public function findDuplicate(){		
		$numbers = array(2, 4, 1, 0, 1 );
		$numbers2 = array(1);
		$this->testDuplicate($numbers, $numbers2);
	}

	public function testDuplicate($array1, $array2){
		$newArray = array();
		foreach($array1 as $value){
			if (!in_array($value, $array2)) {
				array_push($newArray, $value);
			}
		}

		$data = array(
			'title' => 'THE BLUE OCEAN REVERSE',
			'input' => "",			
			'message' => 'My Message'
		);

		$data['message'] = implode(",",$newArray);
		
		$this->load->view('welcome_message',$data);
	}
}
