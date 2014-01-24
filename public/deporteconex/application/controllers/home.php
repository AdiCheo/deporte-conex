<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{

	public function index()
	{
		if(isset($_POST['btnSubmit']))
		{
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			
			$this->email->initialize($config);
				
			$fullname = $this->input->post('txtName');
			$this->email->from($this->input->post('txtEmail'), $fullname);
			$this->email->to('George_siblesz@deporteconex.com'); 
			
			$message ="";
			$this->email->subject('Deporte Conex Subscriber');
			$message .= "Full Name: ".$fullname."\n\n";
			$message .= "Email: ".$this->input->post('txtEmail')."\n\n";
			$message .= "I am a: ".$this->input->post('selIma')."\n\n";
			$message .= "Message: ".$this->input->post('txtMessage')."\n\n";
			$this->email->message($message);
			
			$this->email->send();
			
			$insert = array(
				'id'=>'',
				'fullname'=>$fullname,
				'email'=>$this->input->post('txtEmail'),
				'type'=>$this->input->post('selIma'),
				'message'=>$this->input->post('txtMessage'),
				'date_subscribed'=>date("Y-m-d h:i:s")
			);
			$this->My_model->inserting('tbl_record',$insert);
			
			redirect(base_url()."thankyou");
		}
		$this->load->view('index');
	}
}

