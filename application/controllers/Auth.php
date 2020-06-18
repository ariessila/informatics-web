<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
    {
		parent::__construct();
	}

	function index()
	{
		redirect('auth/login');
	}

	function login(){
		$valid = $this->form_validation;
        $valid->set_rules('username', 'Username', 'trim|required|strip_tags', array('required' => '{field} harus diisi.'));
        $valid->set_rules('password', 'Password', 'trim|required|strip_tags', array('required' => '{field} harus diisi.'));


        if (! $valid->run())
        {
			$data = array(
						'title'     => 'Sistem Departemen Teknik Informatika',
                        'isi'       => 'auth/login');
			$this->load->view('auth/_layout/wrapper', $data);
        }
        else
        {

            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $remember = $this->input->post('remember_me');

			//Lakukan Login
			if(! $this->uauth->login($username, $password, $remember))
			{
				$this->session->set_flashdata("failed", "Username atau Password Salah");
				redirect(login_url());
			}else{
				$roles = $this->uauth->getRoles();
				foreach ($roles as $roles) {
					switch ($roles)
					{
						case 'admin':
							$this->session->set_flashdata("success","Selamat datang admin di sistem!");
							redirect(admin_url());
							break;
						case 'dosen':
							$this->session->set_flashdata("success","Selamat datang admin di sistem!");
							redirect(dosen_url());
							break;
					}
				}
			}

        }
	}

	function logout(){
		$this->uauth->logout();
		redirect(login_url());
	}

	function forgot(){
		$valid = $this->form_validation;
        $valid->set_rules(
					'email',
					'Email',
					'required|valid_email',
					array(
						'required' 		=> '{field} harus diisi.',
						'valid_email'	=> '{field} format email harus benar.'));

		if(! $valid->run()){
			$data = array(
						'title'     => 'Lupa Password',
                        'isi'       => 'auth/forgot');
			$this->load->view('auth/_layout/wrapper', $data);
		}
		else{
			$email = $this->input->post('email');
			// Do Whateever u want
			// Sent Via Email or anything
		}

	}
}
