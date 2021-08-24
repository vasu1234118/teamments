<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Test {

	public function __construct()
	{
		Events::register('send_mail', array($this, 'sendMail'));
	}

    public function sendMail()
    {
        $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'sainath@digitohub.com', // change it to yours
        'smtp_pass' => 'Sai@9989232079', // change it to yours
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
        );

            $message = 'This is mail to notify new activity';
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('sainath@digitohub.com'); // change it to yours
            $this->email->to('sainath@digitohub.com');// change it to yours
            $this->email->subject('New Task Assigned');
            $this->email->message($message);
            if($this->email->send())
            {
                echo 'Email sent.';
            }
            else
            {
                show_error($this->email->print_debugger());
            }

    }
}