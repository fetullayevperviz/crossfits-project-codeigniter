<?php

class Login extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
    	$control = session('read','adminlogin');
    	if($control)
    	{
    		redirect('admin');
    	}
    }

	public function index()
	{
		$this->load->view('back/login');
	}

	public function loginto()
	{
      $email     =  $this->input->post('email');
      $password  =  $this->input->post('password');
      $pass      =  sha1(md5($password));
      $result    = $this->Db->single('admin',array('email'=>$email,'pass'=>$pass));
      if($result)
      { 
         session('write','adminlogin',true);
         session('write','admininfo',$result);
         redirect('admin');
      }
      else
      {
         flash('pink','Xəta','Email və ya Şifrə doğru deyil');
         redirect('login');
      }
	}
}
