<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('reservation_model');
		$this->load->library('user_agent');
	}

    public function index(){
        $this->load->helper('form');
        $data['places']=$this->reservation_model->get_places();
		$this->load->view('reservation-form',$data);
    }

    public function send_mail(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('tp','Telephone Number','trim|min_length[6]',array('min_length' => 'Enter a valid phone number'));
        $this->form_validation->set_rules('country','Country','trim|required');
        $this->form_validation->set_rules('tour-type','Tour type','trim|required');
        //$this->form_validation->set_rules('place_name','Place Name','trim|required');
        //$this->form_validation->set_rules('tour_package','Tour Package','trim|required');
        $this->form_validation->set_rules('arrival','Date Arrival','trim|required');
        $this->form_validation->set_rules('adult','No of Person','trim|required');

        $this->form_validation->set_rules('departure','Departure Date',array
            (
                'required',
                array(
                        'departure_callable',
                        function($str)
                        {
                                $arival= $this->input->post('arrival');
                                return (strtotime($str) > strtotime($arival)) ? TRUE : FALSE;
                        }
                )

            ),
            array('departure_callable' => 'Departure Date should be a date after arrival date')
        );

        if ($this->form_validation->run() == FALSE){
            $this->load->view('reservation-form');
        }else{
            $this->mail();
           redirect('reservation');
            //$this->load->view('reservation-form');
        }
    }

    protected function mail(){
		
        $this->load->library('email');

        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';

		$this->email->initialize($config);

		$country = file_get_contents('https://ipapi.co/'.$this->input->post('ip').'/country_name/'); 
		$city = file_get_contents('https://ipapi.co/'. $_SERVER['REMOTE_ADDR'].'/city/');
        $subject = 'Reservation Form Submission';
        $places = $this->input->post('place_name[]');

        $data['res_data'] = array(
            'res_name' => $this->input->post('name'),
            'res_email' => $this->input->post('email'),
            'res_telephone' => $this->input->post('tp'),
            'res_country' => $this->input->post('country'),
            'res_message' => $this->input->post('requirments'),
            'res_adults' => $this->input->post('adult'),
            'res_children' => $this->input->post('children'),
            'res_pets' => $this->input->post('pet'),

            'res_guide_assistance' => $this->input->post('guide'),
            'res_guide_language' => $this->input->post('language'),

            'res_accomadation_type' => $this->input->post('accomadation'),
            'res_meals_type' => $this->input->post('meals'),


            'res_tour_package_type' => $this->input->post('tour-type'),
            'res_tour_package_id' => $this->input->post('tour_package'),
            'res_places' => implode(",",$places),
            'res_arival_date' => $this->input->post('arrival'),
			'res_departure_date' => $this->input->post('departure'),
			'res_date' => $this->input->post('date'),
			'res_time' => $this->input->post('time'),
			'res_ip' => $this->input->post('ip'),
			'res_device' => $this->input->post('device'),
			'res_ip_country' => $country,
			'res_ip_city' => $city
        );
		
		$this->reservation_model->save_reservation($data);
        $body = $this->load->view('emails/email-template.php',$data,TRUE);

        $dev_email = $this->config->item('dev_email');
		$admin_email = $this->config->item('admin_email');
		$this->email->to($admin_email);
								
		if($dev_email){
		$this->email->bcc($dev_email);
		}
        
        $this->email->from('contact-form@contact.com', 'Contact-form');
        //$this->email->cc('another@another-example.com');
        //$this->email->bcc('them@their-example.com');
        $this->email->subject('Contact Form -'.$subject);
        $this->email->message($body);

        /*if($this->email->send()){
			$this->session->set_flashdata('send_email', "Message sent!");
			redirect('reservation');
		}else{
			$this->session->set_flashdata('send_email', "Message not sent! Try again");
        } */

    }
}
