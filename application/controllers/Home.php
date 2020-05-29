<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['info'] = $this->Db->info();
		$this->load->view('front/home',$data);
	}

	public function gallery()
	{ 
		$data['info'] = $this->Db->info();
		$this->load->view('front/gallery/gallery',$data);
	}

	public function zulallar()
	{ 
		$data['info'] = $this->Db->info();
		$this->load->view('front/zulallar/zulallar',$data);
	}

	public function amin_tursulari()
	{ 
		$data['info'] = $this->Db->info();
		$this->load->view('front/amin_tursulari/amin_tursulari',$data);
	}

	public function ceki_ve_hecm()
	{ 
		$data['info'] = $this->Db->info();
		$this->load->view('front/ceki_ve_hecm/ceki_ve_hecm',$data);
	}

	public function yag_yandiranlar()
	{ 
		$data['info'] = $this->Db->info();
		$this->load->view('front/yag_yandiranlar/yag_yandiranlar',$data);
	}

	public function guc_ve_enerji()
	{ 
		$data['info'] = $this->Db->info();
		$this->load->view('front/guc_ve_enerji/guc_ve_enerji',$data);
	}

	public function vitaminler()
	{ 
		$data['info'] = $this->Db->info();
		$this->load->view('front/vitaminler/vitaminler',$data);
	}

	public function diger_mehsullar()
	{ 
		$data['info'] = $this->Db->info();
		$this->load->view('front/diger_mehsullar/diger_mehsullar',$data);
	}

	public function triners()
	{ 
		$data['info'] = $this->Db->info();
		$this->load->view('front/triners/triners',$data);
	}

	public function programs()
	{
		$data['info'] = $this->Db->info();
		$this->load->view('front/programs/programs',$data);
	}

	public function contact()
	{ 
		$data['info'] = $this->Db->info();
		$this->load->view('front/contact/contact',$data);
	}

	public function program_details($sef)
    {
    	$data['info'] = $this->Db->info();
        $result = $this->dtbs->program_details($sef);
        $data['program'] = $result;
        $this->load->view('front/programs/details/program_details',$data);
    }

	public function amin_tursulari_details($sef)
    {
    	$data['info'] = $this->Db->info();
        $result = $this->dtbs->amin_tursulari_details($sef);
        $data['amin_tursulari'] = $result;
        $this->load->view('front/amin_tursulari/details/amin_tursu_details',$data);
    }

	public function ceki_hecm_details($sef)
    {
    	$data['info'] = $this->Db->info();
        $result = $this->dtbs->ceki_hecm_details($sef);
        $data['ceki_hecm'] = $result;
        $this->load->view('front/ceki_ve_hecm/details/ceki_ve_hecm_details',$data);
    }

	public function diger_mehsullar_details($sef)
    {
    	$data['info'] = $this->Db->info();
        $result = $this->dtbs->diger_mehsullar_details($sef);
        $data['diger_mehsullar'] = $result;
        $this->load->view('front/diger_mehsullar/details/diger_mehsullar_details',$data);
    }

	public function zulal_details($sef)
    {
    	$data['info'] = $this->Db->info();
        $result = $this->dtbs->zulal_details($sef);
        $data['zulallar'] = $result;
        $this->load->view('front/zulallar/details/zulal_details',$data);
    }

	public function guc_enerji_details($sef)
    {
    	$data['info'] = $this->Db->info();
        $result = $this->dtbs->guc_enerji_details($sef);
        $data['guc_enerji'] = $result;
        $this->load->view('front/guc_ve_enerji/details/guc_ve_enerji_details',$data);
    }

	public function yag_yandiranlar_details($sef)
    {
    	$data['info'] = $this->Db->info();
        $result = $this->dtbs->yag_yandiranlar_details($sef);
        $data['yag_yandiranlar'] = $result;
        $this->load->view('front/yag_yandiranlar/details/yag_yandiranlar_details',$data);
    }

	public function vitaminler_details($sef)
    {
    	$data['info'] = $this->Db->info();
        $result = $this->dtbs->vitaminler_details($sef);
        $data['vitaminler'] = $result;
        $this->load->view('front/vitaminler/details/vitaminler_details',$data);
    }

	public function triner_info($sef)
    {
    	$data['info'] = $this->Db->info();
        $result = $this->dtbs->triner_info($sef);
        $data['triner'] = $result;
        $this->load->view('front/triners/details/triner_info',$data);
    }


    public function send_message()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('fullname','Ad Soyad','trim|required|min_length[5]|xss_clean');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('phone','Telefon','trim|required|xss_clean');
        $this->form_validation->set_rules('message', 'Mesaj','trim|required|xss_clean');
        $xetalar = array(
                         'required'    => "{field} xanasını doldurmaq məcburidir",
                         'min_length'  => "ad soyad ən az 5 hərf olmalıdır telefon",
                         'valid_email' => "{field} - email adresini yoxlayın..!"
                        );
        $this->form_validation->set_message($xetalar);
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('info','<blockquote class="blockquote">
												     <p>'.$xetalar['info']=validation_errors().'</p>
												  </blockquote>');
            redirect($_SERVER['HTTP_REFERER']);
        } 
        else 
        {
        
            $fullname    = $this->input->post('fullname',true);
            $email       = $this->input->post('email',true);
            $message     = $this->input->post('message',true);
            $phone       = $this->input->post('phone');
            $ip          = $this->input->post('ip');
            $status      = 0;
            $m_date      = date('d-m-Y');
            $data = [
                      'fullname'    => $fullname,
                      'email'       => $email,
                      'message'     => $message,
                      'phone'       => $phone,
                      'ip'          => $ip,
                      'status'      => $status,
                      'm_date'      => $m_date
                    ];

            $result = $this->dtbs->insert('message',$data);
            if($result)
            {
                $this->session->set_flashdata('info', '<blockquote class="blockquote">
                                                          <strong>Təşəkkürlər</strong>
                                                          <p>Qısa bir zamanda mesajınıza cavab göndəriləcəkdir</p>
                                                        </blockquote>');
                redirect($_SERVER['HTTP_REFERER']);
            }
            else
            {
                $this->session->set_flashdata('info','<blockquote class="blockquote">
                                                        <strong>Təəsüf ki,</strong>
                                                        <p>Mesaj göndərmək mümkün olmadı.Daha sonra təkrar cəhd edin..</p>
                                                      </blockquote>');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }


}
