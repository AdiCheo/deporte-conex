<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller{

	public function index()
	{
		if(isset($_POST['btnSubmit']))
		{
			$personal_info = array(
				'user_id'	=>	'',
				'firstname'	=>	$this->input->post('txtFname'),
				'lastname'	=>	$this->input->post('txtLname'),
				'email'	=>	$this->input->post('txtEmail'),
				'birthday'	=>	date("Y-m-d",strtotime($this->input->post('txtBirthDate'))),
				'expected_graduate'	=>$this->input->post('month')." ".$this->input->post('year'),
				'height'	=>	$this->input->post('txtHeight'),
				'weight'	=>	$this->input->post('txtWeight'),
				'date_added'	=>	date("Y-m-d h:i:s"),
			);
			
			$this->My_model->inserting('tbl_personal_information',$personal_info);
			
			/** LAST INSERT ID **/
			$user_id = $this->db->insert_id();
			
			$contact_number = array(
				'contact_id'	=>	'',
				'user_id'		=>	$user_id,
				'phone_number'	=>	$this->input->post('txtPhone'),
				'date_added'	=>	date("Y-m-d h:i:s")
			);
			
			$this->My_model->inserting('tbl_contact_number',$contact_number);
			
			$parents = array(
				'parent_id'	=>	'',
				'user_id'		=>	$user_id,
				'mom_name'		=>	$this->input->post('txtMother'),
				'mom_email'		=>	$this->input->post('txtMotherEmail'),
				'dad_name'		=>	$this->input->post('txtFather'),
				'dad_email'		=>	$this->input->post('txtFatherEmail'),
				'date_added'	=>	date("Y-m-d h:i:s")
			);
			
			$this->My_model->inserting('tbl_parents',$parents);
			
			$address = array(
				'address_id'	=>	'',
				'user_id'		=>	$user_id,
				'address'		=>	$this->input->post('txtStreet')." ".$this->input->post('txtStreetTwo'),
				'city'		=>	$this->input->post('txtCity'),
				'state'		=>	$this->input->post('txtSPR'),
				'postal'		=>	$this->input->post('txtCode'),
				'country_id'		=>	$this->input->post('selCountry'),
				'date_added'	=>	date("Y-m-d h:i:s")
			);
			
			$this->My_model->inserting('tbl_address',$address);
			
			$athelete_sports = array(
				'athlete_sports_id'		=>		'',
				'user_id'		=>	$user_id,
				'sports_id'		=>	$this->input->post('selSports'),
				'highschool'		=>	$this->input->post('txtHSNumber'),
				'clubteam'		=>	$this->input->post('txtClubNumber'),
				'individual_awards'		=>	$this->input->post('txtAwards'),
				'team_awards'		=>	$this->input->post('txtTeamAwards'),
				'gpa'		=>	$this->input->post('txtHSGPA'),
				'sat_score'		=>	$this->input->post('txtSatScore'),
				'toefl_score'		=>	$this->input->post('txtTOEFL'),
				'act_score'		=>	$this->input->post('txtACT'),
				'position'		=>	$this->input->post('txtPosition'),
				'date_added'	=>	date("Y-m-d h:i:s")
			);
			
			$this->My_model->inserting('tbl_athlete_sports',$athelete_sports);
			
			
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			
			$this->email->initialize($config);
			
			$fullname = $personal_info['firstname'] . " " . $personal_info['lastname'];
			
			$this->email->from($personal_info['email'], $fullname);
			$this->email->to('George_siblesz@deporteconex.com');
			// $this->email->to('loteriasydneytot@yahoo.com');
			
			$message ="";
			$this->email->subject('Deporte Conex Member');
			
			$message .= "Full Name: ".$fullname."\n\n";
			$message .= "Email Address: ".$personal_info['email']."\n\n";
			$message .= "Birthday: ".date("F d, Y",strtotime($personal_info['birthday']))."\n\n";
			$message .= "Expected Year of Graduate: ".$personal_info['expected_graduate']."\n\n";
			$message .= "Phone Number: ".$contact_number['phone_number']."\n\n\n";
			
			$message .= "Mother's Name: ".$parents['mom_name']."\n\n";
			$message .= "Email Address: ".$parents['mom_email']."\n\n\n";
			
			$message .= "Father's Name: ".$parents['dad_name']."\n\n";
			$message .= "Email Address: ".$parents['dad_email']."\n\n\n";
			
			$message .= "Home Address: ".$address['address']."\n\n";
			$message .= "City: ".$address['city']."\n\n";
			$message .= "State: ".$address['state']."\n\n";
			$message .= "Postal: ".$address['postal']."\n\n";
			
			$country = $this->My_model->select_single_record('countries',array('id'=>$address['country_id']));
			$message .= "Country: ".$country->country_name."\n\n\n";
			
			$sports = $this->My_model->select_single_record('tbl_sports',array('sports_id'=>$athelete_sports['sports_id']));
			$message .= "Sports: ".$sports->sports_name."\n\n";
			
			$message .= "High school (and jersey / uniform #): ".$athelete_sports['highschool']."\n\n";
			$message .= "Club team (and jersey / uniform #): ".$athelete_sports['clubteam']."\n\n";
			$message .= "Position: ".$athelete_sports['position']."\n\n";
			$message .= "Height: ".$personal_info['height']." cm\n\n";
			$message .= "weight: ".$personal_info['weight']." lbs\n\n";
			$message .= "Individual Awards and Recognitions: ".$athelete_sports['individual_awards']."\n\n";
			$message .= "Team Awards and Accomplishments: ".$athelete_sports['team_awards']."\n\n";
			$message .= "High school GPA: ".$athelete_sports['gpa']."\n\n";
			$message .= "SAT Score(s): ".$athelete_sports['sat_score']."\n\n";
			$message .= "TOEFL Score(s): ".$athelete_sports['toefl_score']."\n\n";
			$message .= "ACT Score(s): ".$athelete_sports['act_score']."\n\n";
			
			$this->email->message($message);
			
			$this->email->send();
			
			redirect(base_url()."thankyou");
		}
		$data['country'] = $this->My_model->select_multiple_record_order_by('countries','country_name');
		$data['sports'] = $this->My_model->select_multiple_record_order_by('tbl_sports','sports_id');
		$this->load->view('signup',$data);
	}
}

