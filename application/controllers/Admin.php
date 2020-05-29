<?php

class Admin extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
    	$control = session('read','adminlogin');
    	if(!$control)
    	{
    		redirect('login');
    	}
    }

	public function index()
	{
		$this->load->view('back/panel');
	}

	public function settings()
	{
		$data['settings'] = $this->Db->single('settings',array('id'=>1));
		$this->load->view('back/settings/anasehife',$data);
	}

  public function settings_update($id)
  {
      $result = $this->dtbs->show($id,'settings');
      $data['info'] = $result;
      $this->load->view('back/settings/edit/anasehife',$data);
  }

    public function settings_edit()
    {
         $id              = trim(strip_tags(htmlspecialchars($this->input->post('id'))));
         $site_name       = trim(strip_tags(htmlspecialchars($this->input->post('site_name'))));
         $site_url        = trim(strip_tags(htmlspecialchars($this->input->post('site_url'))));
         $email           = trim(strip_tags(htmlspecialchars($this->input->post('email'))));
         $phone           = trim(strip_tags(htmlspecialchars($this->input->post('phone'))));
         $info            = trim(strip_tags(htmlspecialchars($this->input->post('info'))));
         $site_keyword    = trim(strip_tags(htmlspecialchars($this->input->post('site_keyword'))));
         $adress          = trim(strip_tags(htmlspecialchars($this->input->post('adress'))));
         $copyright_text  = trim(strip_tags(htmlspecialchars($this->input->post('copyright_text'))));
         $data          = [
                              'id'             => $id,
                              'site_name'      => $site_name,
                              'site_url'       => $site_url,
                              'email'          => $email,
                              'phone'          => $phone,
                              'info'           => $info,
                              'site_keyword'   => $site_keyword,
                              'adress'         => $adress,
                              'copyright_text' => $copyright_text
                          ];
        $result = $this->dtbs->update($data,$id,'id','settings');
        if($result)
        {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
            	                                       fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Parametrlər Yeniləndi. 
                                                       </div>');
            redirect('admin/settings');
        }
        else
        {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
            	                                       fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Parametrlər Yenilənmədi. 
                                                       </div>');
            redirect('admin/settings');
        }
     }

   public function profile()
   {
      $info = session('read','admininfo');
      $userId = $info->id;
      $result = $this->dtbs->profile_info('admin', $userId);
      $data['info'] = $result;
      $this->load->view('back/profile/anasehife',$data);
   }


  	public function close()
  	{
  		$this->session->sess_destroy();
  		redirect('login');
  	}

   public function users()
   {
      $result = $this->dtbs->list('admin');
      $data['info'] = $result;
      $this->load->view('back/users/anasehife',$data);
   }

   public function user_add()
   {
     $result = $this->dtbs->list('admin');
     $data['info'] = $result;
     $this->load->view('back/users/insert/anasehife', $data);
   }

   public function user_insert()
   {
     $config['upload_path']   = FCPATH.'assets/front/images/users';
     $config['allowed_types'] = '*';
     $config['encrypt_name']  = TRUE;
     $this->load->library('upload', $config);
       
       if($this->upload->do_upload('image'))
       {
         //tmb operation start
         $image                    = $this->upload->data();
         $image_path               = $image['file_name'];
         $image_save               = 'assets/front/images/users/'.$image_path.'';
         $image_tmb                = 'assets/front/images/users/tmb/'.$image_path.'';
         $config['image_library']  = 'gd2';
         $config['source_image']   = 'assets/front/images/users/'.$image_path.'';
         $config['new_image']      = 'assets/front/images/users/tmb/'.$image_path.'';
         $config['create_thumb']   = false;
         $config['maintain_ratio'] = false;
         $config['quality']        = '60%';
         $config['width']          = 300;
         $config['height']         = 200;
         $this->load->library('image_lib',$config);
         $this->image_lib->initialize($config);
         $this->image_lib->resize();
         $this->image_lib->clear();
         //tmb operation end
          $data =  [
                    'image'       => $image_save,
                    'tmb'         => $image_tmb,
                    'fullname'    => trim(strip_tags(htmlspecialchars($this->input->post('fullname')))),
                    'username'    => trim(strip_tags(htmlspecialchars($this->input->post('username')))),
                    'email'       => trim(strip_tags(htmlspecialchars($this->input->post('email')))),
                    'phone'       => trim(strip_tags(htmlspecialchars($this->input->post('phone')))),
                    'adress'      => trim(strip_tags(htmlspecialchars($this->input->post('adress')))),
                    'position'    => trim(strip_tags(htmlspecialchars($this->input->post('position')))),
                    'age'         => trim(strip_tags(htmlspecialchars($this->input->post('age')))),
                    'city'        => trim(strip_tags(htmlspecialchars($this->input->post('city')))),
                    'info'        => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                    'pass'        => trim(strip_tags(htmlspecialchars(sha1(md5($this->input->post('pass')))))),
                    'permission'  => $permission = 0
                  ];
          $result = $this->dtbs->insert('admin',$data);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Başarılı!</strong><br>
                                                      İstifadəçi Əlavə Edildi.. 
                                                     </div>');
              redirect('admin/users');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Xətalı!</strong><br>
                                                      İstifadəçi Əlavə Edilmədi
                                                     </div>');
              redirect('admin/users');
          }

     }
   }

   public function user_update($id)
   {
       $result       = $this->dtbs->show($id,'admin');
       $data['info'] = $result;
       $this->load->view('back/users/edit/anasehife',$data);
   }

 public function user_edit()
 {
     $id     = $this->input->post('id');
  
     $config['upload_path']   = FCPATH.'assets/front/images/users';
     $config['allowed_types'] = '*';
     $config['encrypt_name']  = TRUE;
     $this->load->library('upload', $config);
     
     if($this->upload->do_upload('image'))
     {
       //tmb operation start
       $image                    = $this->upload->data();
       $image_path               = $image['file_name'];
       $image_save               = 'assets/front/images/users/'.$image_path.'';
       $image_tmb                = 'assets/front/images/users/tmb/'.$image_path.'';
       $config['image_library']  = 'gd2';
       $config['source_image']   = 'assets/front/images/users/'.$image_path.'';
       $config['new_image']      = 'assets/front/images/users/tmb/'.$image_path.'';
       $config['create_thumb']   = false;
       $config['maintain_ratio'] = false;
       $config['quality']        = '60%';
       $config['width']          = 300;
       $config['height']         = 200;
       $this->load->library('image_lib',$config);
       $this->image_lib->initialize($config);
       $this->image_lib->resize();
       $this->image_lib->clear();
       //tmb operation end
       
       $image_delete      = user_image($id);
       $tmb_image_delete  = user_tmb_image($id);
       unlink($image_delete);
       unlink($tmb_image_delete);

        $data = [
                  'image'         => $image_save,
                  'tmb'           => $image_tmb,
                  'fullname'      => trim(strip_tags(htmlspecialchars($this->input->post('fullname')))),
                  'username'      => trim(strip_tags(htmlspecialchars($this->input->post('username')))),
                  'email'         => trim(strip_tags(htmlspecialchars($this->input->post('email')))),
                  'phone'         => trim(strip_tags(htmlspecialchars($this->input->post('phone')))),
                  'adress'        => trim(strip_tags(htmlspecialchars($this->input->post('adress')))),
                  'position'      => trim(strip_tags(htmlspecialchars($this->input->post('position')))),
                  'age'           => trim(strip_tags(htmlspecialchars($this->input->post('age')))),
                  'city'          => trim(strip_tags(htmlspecialchars($this->input->post('city')))),
                  'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                  'pass'          => trim(strip_tags(htmlspecialchars(sha1(md5($this->input->post('pass')))))),
                  'permission'    => $this->input->post('permission')
                ];
        $result = $this->dtbs->update($data,$id,'id','admin');
        if($result)
        {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    İstifadəçi Məlumatları Yeniləndi.. 
                                                   </div>');
          redirect('admin/users');
        }
        else
        {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    İstifadəçi Məlumatları Yenilənmədi.. 
                                                   </div>');
          redirect('admin/users');
        }

    }
    else
    {
        $data = [
                  'id'            => $this->input->post('id'),
                  'fullname'      => trim(strip_tags(htmlspecialchars($this->input->post('fullname')))),
                  'username'      => trim(strip_tags(htmlspecialchars($this->input->post('username')))),
                  'email'         => trim(strip_tags(htmlspecialchars($this->input->post('email')))),
                  'phone'         => trim(strip_tags(htmlspecialchars($this->input->post('phone')))),
                  'adress'        => trim(strip_tags(htmlspecialchars($this->input->post('adress')))),
                  'position'      => trim(strip_tags(htmlspecialchars($this->input->post('position')))),
                  'age'           => trim(strip_tags(htmlspecialchars($this->input->post('age')))),
                  'city'          => trim(strip_tags(htmlspecialchars($this->input->post('city')))),
                  'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                  'permission'    => $this->input->post('permission')
                ];
        $result = $this->dtbs->update($data,$id,'id','admin');
        if($result)
        {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    İstifadəçi Məlumatları Yeniləndi.. 
                                                   </div>');
          redirect('admin/users');
        }
        else
        {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    İstifadəçi Məlumatları Yenilənmədi.. 
                                                   </div>');
          redirect('admin/users');
        }

    }

 }

   public function user_delete($id,$where,$from)
   {

      $image_delete      = user_image($id);
      $tmb_image_delete  = user_tmb_image($id);
      unlink($image_delete);
      unlink($tmb_image_delete);

      $result = $this->dtbs->delete($id,$where,$from);
      if($result)
      {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    İstifadəçi Silindi.. 
                                                   </div>');
          redirect('admin/users');
      }
      else
      {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    İstifadəçi Silinmədi.. 
                                                   </div>');
          redirect('admin/users');
      }
   }

     public function sliders()
     {
        $result = $this->dtbs->list('slider');
        $data['info'] = $result;
        $this->load->view('back/slider/anasehife',$data);
     }

     public function slider_add()
     {
       $result = $this->dtbs->list('slider');
       $data['info'] = $result;
       $this->load->view('back/slider/insert/anasehife', $data);
     }

     public function slider_insert()
     {
       $config['upload_path']   = FCPATH.'assets/front/images/slider';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/slider/'.$image_path.'';
           $image_tmb                = 'assets/front/images/slider/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/slider/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/slider/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 1900;
           $config['height']         = 1267;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
            $data =  [
                      'image'       => $image_save,
                      'tmb'         => $image_tmb,
                      'image_text1' => $this->input->post('image_text1',true),
                      'image_text2' => $this->input->post('image_text2',true),
                      'status'     =>  $status = 0
                    ];
            $result = $this->dtbs->insert('slider',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Slider Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/sliders');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Slider Əlavə Edilmədi
                                                       </div>');
                redirect('admin/sliders');
            }

       }
     }

     public function slider_update($id)
     {
         $result       = $this->dtbs->show($id,'slider');
         $data['info'] = $result;
         $this->load->view('back/slider/edit/anasehife',$data);
     }


     public function slider_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');

         $config['upload_path']   = FCPATH.'assets/front/images/slider';
         $config['allowed_types'] = '*';
         $config['encrypt_name']  = TRUE;
         $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/slider/'.$image_path.'';
           $image_tmb                = 'assets/front/images/slider/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/slider/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/slider/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 1900;
           $config['height']         = 1267;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
           
           $image_delete      = slider_image($id);
           $tmb_image_delete  = slider_tmb_image($id);
           unlink($image_delete);
           unlink($tmb_image_delete);

            $data = [
                      'image'         => $image_save,
                      'tmb'           => $image_tmb,
                      'image_text1'   => trim(strip_tags(htmlspecialchars($this->input->post('image_text1')))),
                      'image_text2'   => trim(strip_tags(htmlspecialchars($this->input->post('image_text2')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','slider');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Slider Yeniləndi.. 
                                                       </div>');
              redirect('admin/sliders');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Slider Yenilənmədi.. 
                                                       </div>');
              redirect('admin/sliders');
            }

        }
        else
        {
            $data = [
                      'id'            => $this->input->post('id'),
                      'image_text1'   => trim(strip_tags(htmlspecialchars($this->input->post('image_text1')))),
                      'image_text2'   => trim(strip_tags(htmlspecialchars($this->input->post('image_text2')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','slider');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Slider Yeniləndi.. 
                                                       </div>');
              redirect('admin/sliders');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Slider Yenilənmədi.. 
                                                       </div>');
              redirect('admin/sliders');
            }

        }

     }

       public function slider_delete($id,$where,$from)
       {

          $image_delete      = slider_image($id);
          $tmb_image_delete  = slider_tmb_image($id);
          unlink($image_delete);
          unlink($tmb_image_delete);

          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Slider Silindi.. 
                                                       </div>');
              redirect('admin/sliders');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Slider Silinmədi.. 
                                                       </div>');
              redirect('admin/sliders');
          }
       }

     public function message()
     {
        $result = $this->dtbs->list('message');
        $data['info'] = $result;
        $this->load->view('back/message/anasehife',$data);
     }

     public function message_read($id)
     {
         $result       = $this->dtbs->show($id,'message');
         if($result)
         {
            $data['result'] = $result;
            $this->load->view('back/message/edit/anasehife',$data);
            $data = array('status'=>1);
            $this->dtbs->message_update($result['id'],$data);

         }
         
     }


     public function message_delete($id,$where,$from)
     {

        $result = $this->dtbs->delete($id,$where,$from);
        if($result)
        {
            $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Mesaj Silindi.. 
                                                       </div>');
            redirect('admin/message');
        }
        else
        {
            $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Mesaj Silindi.. 
                                                       </div>');
            redirect('admin/message');
        }
     }


     public function exercises()
     {
        $result = $this->dtbs->list('exercises');
        $data['info'] = $result;
        $this->load->view('back/exercises/anasehife',$data);
     }

     public function exercises_add()
     {
       $result = $this->dtbs->list('exercises');
       $data['info'] = $result;
       $this->load->view('back/exercises/insert/anasehife', $data);
     }

     public function exercises_insert()
     {
       $config['upload_path']   = FCPATH.'assets/front/images/exercises';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/exercises/'.$image_path.'';
           $image_tmb                = 'assets/front/images/exercises/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/exercises/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/exercises/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 500;
           $config['height']         = 400;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
            $data =  [
                      'image'       => $image_save,
                      'tmb'         => $image_tmb,
                      'status'      => $status = 0
                    ];
            $result = $this->dtbs->insert('exercises',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Məşq Şəkili Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/exercises');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Məşq Şəkili Əlavə Edilmədi
                                                       </div>');
                redirect('admin/exercises');
            }

       }
     }

     public function exercises_update($id)
     {
         $result       = $this->dtbs->show($id,'exercises');
         $data['info'] = $result;
         $this->load->view('back/exercises/edit/anasehife',$data);
     }


     public function exercises_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');


         $config['upload_path']   = FCPATH.'assets/front/images/exercises';
         $config['allowed_types'] = '*';
         $config['encrypt_name']  = TRUE;
         $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/exercises/'.$image_path.'';
           $image_tmb                = 'assets/front/images/exercises/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/exercises/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/exercises/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 500;
           $config['height']         = 400;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
           
           $image_delete      = exercises_image($id);
           $tmb_image_delete  = exercises_tmb_image($id);
           unlink($image_delete);
           unlink($tmb_image_delete);

            $data = [
                      'image'         => $image_save,
                      'tmb'           => $image_tmb,
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','exercises');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Məşq Şəkili Yeniləndi.. 
                                                       </div>');
              redirect('admin/exercises');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Məşq Şəkili Yenilənmədi.. 
                                                       </div>');
              redirect('admin/exercises');
            }

        }
        else
        {
            $data = [
                      'id'            => $this->input->post('id'),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','exercises');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Məşq Şəkili Yeniləndi.. 
                                                       </div>');
              redirect('admin/exercises');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Məşq Şəkili Yenilənmədi.. 
                                                       </div>');
              redirect('admin/exercises');
            }

        }

     }

       public function exercises_delete($id,$where,$from)
       {

          $image_delete      = exercises_image($id);
          $tmb_image_delete  = exercises_tmb_image($id);
          unlink($image_delete);
          unlink($tmb_image_delete);

          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Məşq Şəkili Silindi.. 
                                                       </div>');
              redirect('admin/exercises');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Məşq Şəkili Silinmədi.. 
                                                       </div>');
              redirect('admin/exercises');
          }
       }


     public function testimiones()
     {
        $result = $this->dtbs->list('testimiones');
        $data['info'] = $result;
        $this->load->view('back/testimiones/anasehife',$data);
     }

     public function testimiones_add()
     {
       $result = $this->dtbs->list('testimiones');
       $data['info'] = $result;
       $this->load->view('back/testimiones/insert/anasehife', $data);
     }

     public function testimiones_insert()
     {
       $config['upload_path']   = FCPATH.'assets/front/images/testimiones';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/testimiones/'.$image_path.'';
           $image_tmb                = 'assets/front/images/testimiones/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/testimiones/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/testimiones/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 300;
           $config['height']         = 300;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
            $data =  [
                      'image'       => $image_save,
                      'tmb'         => $image_tmb,
                      'fullname'    => $this->input->post('fullname',true),
                      'info'        => $this->input->post('info',true),
                      'status'      => $status = 0
                    ];
            $result = $this->dtbs->insert('testimiones',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Şəhadətnamə Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/testimiones');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Şəhadətnamə Əlavə Edilmədi
                                                       </div>');
                redirect('admin/testimiones');
            }

       }
     }

     public function testimiones_update($id)
     {
         $result       = $this->dtbs->show($id,'testimiones');
         $data['info'] = $result;
         $this->load->view('back/testimiones/edit/anasehife',$data);
     }


     public function testimiones_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');
         $config['upload_path']   = FCPATH.'assets/front/images/testimiones';
         $config['allowed_types'] = '*';
         $config['encrypt_name']  = TRUE;
         $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/testimiones/'.$image_path.'';
           $image_tmb                = 'assets/front/images/testimiones/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/testimiones/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/testimiones/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 300;
           $config['height']         = 300;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
           
           $image_delete      = testimiones_image($id);
           $tmb_image_delete  = testimiones_tmb_image($id);
           unlink($image_delete);
           unlink($tmb_image_delete);

            $data = [
                      'image'         => $image_save,
                      'tmb'           => $image_tmb,
                      'fullname'      => trim(strip_tags(htmlspecialchars($this->input->post('fullname')))),
                      'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','testimiones');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Şəhadətnamə Yeniləndi.. 
                                                       </div>');
              redirect('admin/testimiones');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Şəhadətnamə Yenilənmədi.. 
                                                       </div>');
              redirect('admin/testimiones');
            }

        }
        else
        {
            $data = [
                      'id'            => $this->input->post('id'),
                      'fullname'      => trim(strip_tags(htmlspecialchars($this->input->post('fullname')))),
                      'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','testimiones');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Şəhadətnamə Yeniləndi.. 
                                                       </div>');
              redirect('admin/testimiones');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Şəhadətnamə Yenilənmədi.. 
                                                       </div>');
              redirect('admin/testimiones');
            }

        }

     }

       public function testimiones_delete($id,$where,$from)
       {

          $image_delete      = testimiones_image($id);
          $tmb_image_delete  = testimiones_tmb_image($id);
          unlink($image_delete);
          unlink($tmb_image_delete);

          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Şəhadətnamə Silindi.. 
                                                       </div>');
              redirect('admin/testimiones');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Şəhadətnamə Silinmədi.. 
                                                       </div>');
              redirect('admin/testimiones');
          }
       }

     public function social_media()
     {
        $result = $this->dtbs->list('social_media');
        $data['info'] = $result;
        $this->load->view('back/social_media/anasehife',$data);
     }

     public function social_add()
     {
       $result = $this->dtbs->list('social_media');
       $data['info'] = $result;
       $this->load->view('back/social_media/insert/anasehife', $data);
     }

     public function social_insert()
     {
            $data =  [
                      'title'       => trim(strip_tags(htmlspecialchars($this->input->post('title')))),
                      'link'        => trim(strip_tags(htmlspecialchars($this->input->post('link')))),
                      'icon'        => trim(strip_tags(htmlspecialchars($this->input->post('icon')))),
                      'status'      => $status = 0
                    ];
            $result = $this->dtbs->insert('social_media',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Sosial Şəbəkə Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/social_media');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Sosial Şəbəkə Əlavə Edilmədi
                                                       </div>');
                redirect('admin/social_media');
            }
     }

     public function social_update($id)
     {
         $result       = $this->dtbs->show($id,'social_media');
         $data['info'] = $result;
         $this->load->view('back/social_media/edit/anasehife',$data);
     }


     public function social_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');
          
          $data = [
                    'title'         => trim(strip_tags(htmlspecialchars($this->input->post('title')))),
                    'link'          => trim(strip_tags(htmlspecialchars($this->input->post('link')))),
                    'icon'          => trim(strip_tags(htmlspecialchars($this->input->post('icon')))),
                    'status'        => $status
                  ];
            $result = $this->dtbs->update($data,$id,'id','social_media');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Sosial Şəbəkə Hesabı Yeniləndi.. 
                                                       </div>');
              redirect('admin/social_media');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Sosial Şəbəkə Hesabı Yenilənmədi.. 
                                                       </div>');
              redirect('admin/social_media');
            }

     }

       public function social_delete($id,$where,$from)
       {
          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Sosial Şəbəkə Hesabı Silindi.. 
                                                       </div>');
              redirect('admin/social_media');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Sosial Şəbəkə Hesabı Silinmədi.. 
                                                       </div>');
              redirect('admin/social_media');
          }
       }


     public function gallery()
     {
        $result = $this->dtbs->list('qalereya');
        $data['info'] = $result;
        $this->load->view('back/gallery/anasehife',$data);
     }

     public function gallery_add()
     {
       $result = $this->dtbs->list('qalereya');
       $data['info'] = $result;
       $this->load->view('back/gallery/insert/anasehife', $data);
     }

     public function gallery_insert()
     {
       $config['upload_path']   = FCPATH.'assets/front/images/gallery';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/gallery/'.$image_path.'';
           $image_tmb                = 'assets/front/images/gallery/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/gallery/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/gallery/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 500;
           $config['height']         = 400;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
            $data =  [
                      'image'       => $image_save,
                      'tmb'         => $image_tmb,
                      'status'      => $status = 0
                    ];
            $result = $this->dtbs->insert('qalereya',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Qalereya Şəkili Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/gallery');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Qalereya Şəkili Əlavə Edilmədi
                                                       </div>');
                redirect('admin/gallery');
            }

       }
     }

     public function gallery_update($id)
     {
         $result       = $this->dtbs->show($id,'qalereya');
         $data['info'] = $result;
         $this->load->view('back/gallery/edit/anasehife',$data);
     }


     public function gallery_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');


         $config['upload_path']   = FCPATH.'assets/front/images/gallery';
         $config['allowed_types'] = '*';
         $config['encrypt_name']  = TRUE;
         $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/gallery/'.$image_path.'';
           $image_tmb                = 'assets/front/images/gallery/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/gallery/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/gallery/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 400;
           $config['height']         = 300;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
           
           $image_delete      = qalereya_image($id);
           $tmb_image_delete  = qalereya_tmb_image($id);
           unlink($image_delete);
           unlink($tmb_image_delete);

            $data = [
                      'image'         => $image_save,
                      'tmb'           => $image_tmb,
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','qalereya');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Qalereya Şəkili Yeniləndi.. 
                                                       </div>');
              redirect('admin/gallery');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Qalereya Şəkili Yenilənmədi.. 
                                                       </div>');
              redirect('admin/gallery');
            }

        }
        else
        {
            $data = [
                      'id'            => $this->input->post('id'),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','qalereya');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Qalereya Şəkili Yeniləndi.. 
                                                       </div>');
              redirect('admin/gallery');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Qalereya Şəkili Yenilənmədi.. 
                                                       </div>');
              redirect('admin/gallery');
            }

        }

     }

       public function gallery_delete($id,$where,$from)
       {

          $image_delete      = qalereya_image($id);
          $tmb_image_delete  = qalereya_tmb_image($id);
          unlink($image_delete);
          unlink($tmb_image_delete);

          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Qalereya Şəkili Silindi.. 
                                                       </div>');
              redirect('admin/gallery');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Qalereya Şəkili Silinmədi.. 
                                                       </div>');
              redirect('admin/gallery');
          }
       }


   public function triner()
   {
      $result = $this->dtbs->list('triner');
      $data['info'] = $result;
      $this->load->view('back/triner/anasehife',$data);
   }

   public function triner_add()
   {
     $result = $this->dtbs->list('triner');
     $data['info'] = $result;
     $this->load->view('back/triner/insert/anasehife', $data);
   }

   public function triner_insert()
   {
     $config['upload_path']   = FCPATH.'assets/front/images/triner';
     $config['allowed_types'] = '*';
     $config['encrypt_name']  = TRUE;
     $this->load->library('upload', $config);
       
       if($this->upload->do_upload('image'))
       {
         //tmb operation start
         $image                    = $this->upload->data();
         $image_path               = $image['file_name'];
         $image_save               = 'assets/front/images/triner/'.$image_path.'';
         $image_tmb                = 'assets/front/images/triner/tmb/'.$image_path.'';
         $config['image_library']  = 'gd2';
         $config['source_image']   = 'assets/front/images/triner/'.$image_path.'';
         $config['new_image']      = 'assets/front/images/triner/tmb/'.$image_path.'';
         $config['create_thumb']   = false;
         $config['maintain_ratio'] = false;
         $config['quality']        = '60%';
         $config['width']          = 500;
         $config['height']         = 400;
         $this->load->library('image_lib',$config);
         $this->image_lib->initialize($config);
         $this->image_lib->resize();
         $this->image_lib->clear();
         //tmb operation end
          $data =  [
                    'image'       => $image_save,
                    'tmb'         => $image_tmb,
                    'fullname'    => trim(strip_tags(htmlspecialchars($this->input->post('fullname')))),
                    'sef'         => permalink($this->input->post('fullname')),
                    'email'       => trim(strip_tags(htmlspecialchars($this->input->post('email')))),
                    'phone'       => trim(strip_tags(htmlspecialchars($this->input->post('phone')))),
                    'adress'      => trim(strip_tags(htmlspecialchars($this->input->post('adress')))),
                    'info'        => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                    'status'      => $status = 0
                  ];
          $result = $this->dtbs->insert('triner',$data);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Başarılı!</strong><br>
                                                      Triner Əlavə Edildi.. 
                                                     </div>');
              redirect('admin/triner');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Xətalı!</strong><br>
                                                      Triner Əlavə Edilmədi
                                                     </div>');
              redirect('admin/triner');
          }

     }
   }

   public function triner_update($id)
   {
       $result       = $this->dtbs->show($id,'triner');
       $data['info'] = $result;
       $this->load->view('back/triner/edit/anasehife',$data);
   }

 public function triner_edit()
 {
     $id     = $this->input->post('id');
  
     $config['upload_path']   = FCPATH.'assets/front/images/triner';
     $config['allowed_types'] = '*';
     $config['encrypt_name']  = TRUE;
     $this->load->library('upload', $config);
     
     if($this->upload->do_upload('image'))
     {
       //tmb operation start
       $image                    = $this->upload->data();
       $image_path               = $image['file_name'];
       $image_save               = 'assets/front/images/triner/'.$image_path.'';
       $image_tmb                = 'assets/front/images/triner/tmb/'.$image_path.'';
       $config['image_library']  = 'gd2';
       $config['source_image']   = 'assets/front/images/triner/'.$image_path.'';
       $config['new_image']      = 'assets/front/images/triner/tmb/'.$image_path.'';
       $config['create_thumb']   = false;
       $config['maintain_ratio'] = false;
       $config['quality']        = '60%';
       $config['width']          = 500;
       $config['height']         = 400;
       $this->load->library('image_lib',$config);
       $this->image_lib->initialize($config);
       $this->image_lib->resize();
       $this->image_lib->clear();
       //tmb operation end
       
       $image_delete      = triner_image($id);
       $tmb_image_delete  = triner_tmb_image($id);
       unlink($image_delete);
       unlink($tmb_image_delete);

        $data = [
                  'image'         => $image_save,
                  'tmb'           => $image_tmb,
                  'fullname'      => trim(strip_tags(htmlspecialchars($this->input->post('fullname')))),
                  'sef'           => permalink($this->input->post('fullname')),
                  'email'         => trim(strip_tags(htmlspecialchars($this->input->post('email')))),
                  'phone'         => trim(strip_tags(htmlspecialchars($this->input->post('phone')))),
                  'adress'        => trim(strip_tags(htmlspecialchars($this->input->post('adress')))),
                  'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                  'status'        => $this->input->post('status')
                ];
        $result = $this->dtbs->update($data,$id,'id','triner');
        if($result)
        {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    Triner Məlumatları Yeniləndi.. 
                                                   </div>');
          redirect('admin/triner');
        }
        else
        {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    Triner Məlumatları Yenilənmədi.. 
                                                   </div>');
          redirect('admin/triner');
        }

    }
    else
    {
        $data = [
                  'fullname'      => trim(strip_tags(htmlspecialchars($this->input->post('fullname')))),
                  'sef'           => permalink($this->input->post('fullname')),
                  'email'         => trim(strip_tags(htmlspecialchars($this->input->post('email')))),
                  'phone'         => trim(strip_tags(htmlspecialchars($this->input->post('phone')))),
                  'adress'        => trim(strip_tags(htmlspecialchars($this->input->post('adress')))),
                  'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                  'status'        => $this->input->post('status')
                ];
        $result = $this->dtbs->update($data,$id,'id','triner');
        if($result)
        {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    Triner Məlumatları Yeniləndi.. 
                                                   </div>');
          redirect('admin/triner');
        }
        else
        {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    Triner Məlumatları Yenilənmədi.. 
                                                   </div>');
          redirect('admin/triner');
        }

    }

 }

   public function triner_delete($id,$where,$from)
   {

      $image_delete      = triner_image($id);
      $tmb_image_delete  = triner_tmb_image($id);
      unlink($image_delete);
      unlink($tmb_image_delete);

      $result = $this->dtbs->delete($id,$where,$from);
      if($result)
      {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    Triner Silindi.. 
                                                   </div>');
          redirect('admin/triner');
      }
      else
      {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    Triner Silinmədi.. 
                                                   </div>');
          redirect('admin/triner');
      }
   }


   public function programs()
   {
      $result = $this->dtbs->list('programs');
      $data['info'] = $result;
      $this->load->view('back/programs/anasehife',$data);
   }

   public function programs_add()
   {
     $result = $this->dtbs->list('programs');
     $data['info'] = $result;
     $this->load->view('back/programs/insert/anasehife', $data);
   }

   public function programs_insert()
   {
     $config['upload_path']   = FCPATH.'assets/front/images/programs';
     $config['allowed_types'] = '*';
     $config['encrypt_name']  = TRUE;
     $this->load->library('upload', $config);
       
       if($this->upload->do_upload('image'))
       {
         //tmb operation start
         $image                    = $this->upload->data();
         $image_path               = $image['file_name'];
         $image_save               = 'assets/front/images/programs/'.$image_path.'';
         $image_tmb                = 'assets/front/images/programs/tmb/'.$image_path.'';
         $config['image_library']  = 'gd2';
         $config['source_image']   = 'assets/front/images/programs/'.$image_path.'';
         $config['new_image']      = 'assets/front/images/programs/tmb/'.$image_path.'';
         $config['create_thumb']   = false;
         $config['maintain_ratio'] = false;
         $config['quality']        = '60%';
         $config['width']          = 500;
         $config['height']         = 400;
         $this->load->library('image_lib',$config);
         $this->image_lib->initialize($config);
         $this->image_lib->resize();
         $this->image_lib->clear();
         //tmb operation end
          $data =  [
                    'image'         => $image_save,
                    'tmb'           => $image_tmb,
                    'program_name'  => trim(strip_tags(htmlspecialchars($this->input->post('program_name')))),
                    'sef'           => permalink($this->input->post('program_name')),
                    'info'        => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                    'status'      => $status = 0
                  ];
          $result = $this->dtbs->insert('programs',$data);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Başarılı!</strong><br>
                                                      Proqram Əlavə Edildi.. 
                                                     </div>');
              redirect('admin/programs');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                   fade show">
                                                      <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                      <strong>Xətalı!</strong><br>
                                                      Proqram Əlavə Edilmədi
                                                     </div>');
              redirect('admin/programs');
          }

     }
   }

   public function programs_update($id)
   {
       $result       = $this->dtbs->show($id,'programs');
       $data['info'] = $result;
       $this->load->view('back/programs/edit/anasehife',$data);
   }

 public function programs_edit()
 {
     $id     = $this->input->post('id');
  
     $config['upload_path']   = FCPATH.'assets/front/images/programs';
     $config['allowed_types'] = '*';
     $config['encrypt_name']  = TRUE;
     $this->load->library('upload', $config);
     
     if($this->upload->do_upload('image'))
     {
       //tmb operation start
       $image                    = $this->upload->data();
       $image_path               = $image['file_name'];
       $image_save               = 'assets/front/images/programs/'.$image_path.'';
       $image_tmb                = 'assets/front/images/programs/tmb/'.$image_path.'';
       $config['image_library']  = 'gd2';
       $config['source_image']   = 'assets/front/images/programs/'.$image_path.'';
       $config['new_image']      = 'assets/front/images/programs/tmb/'.$image_path.'';
       $config['create_thumb']   = false;
       $config['maintain_ratio'] = false;
       $config['quality']        = '60%';
       $config['width']          = 500;
       $config['height']         = 400;
       $this->load->library('image_lib',$config);
       $this->image_lib->initialize($config);
       $this->image_lib->resize();
       $this->image_lib->clear();
       //tmb operation end
       
       $image_delete      = programs_image($id);
       $tmb_image_delete  = programs_tmb_image($id);
       unlink($image_delete);
       unlink($tmb_image_delete);

        $data = [
                  'image'         => $image_save,
                  'tmb'           => $image_tmb,
                  'program_name'  => trim(strip_tags(htmlspecialchars($this->input->post('program_name')))),
                  'sef'           => permalink($this->input->post('program_name')),
                  'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                  'status'        => $this->input->post('status')
                ];
        $result = $this->dtbs->update($data,$id,'id','programs');
        if($result)
        {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    Proqram Məlumatları Yeniləndi.. 
                                                   </div>');
          redirect('admin/programs');
        }
        else
        {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    Proqram Məlumatları Yenilənmədi.. 
                                                   </div>');
          redirect('admin/programs');
        }

    }
    else
    {
        $data = [
                  'program_name'  => trim(strip_tags(htmlspecialchars($this->input->post('program_name')))),
                  'sef'           => permalink($this->input->post('program_name')),
                  'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                  'status'        => $this->input->post('status')
                ];
        $result = $this->dtbs->update($data,$id,'id','programs');
        if($result)
        {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    Proqram Məlumatları Yeniləndi.. 
                                                   </div>');
          redirect('admin/programs');
        }
        else
        {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    Proqram Məlumatları Yenilənmədi.. 
                                                   </div>');
          redirect('admin/programs');
        }

    }

 }

   public function programs_delete($id,$where,$from)
   {

      $image_delete      = programs_image($id);
      $tmb_image_delete  = programs_tmb_image($id);
      unlink($image_delete);
      unlink($tmb_image_delete);

      $result = $this->dtbs->delete($id,$where,$from);
      if($result)
      {
          $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Başarılı!</strong><br>
                                                    Proqram Silindi.. 
                                                   </div>');
          redirect('admin/programs');
      }
      else
      {
          $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                 fade show">
                                                    <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>Xətalı!</strong><br>
                                                    Proqram Silinmədi.. 
                                                   </div>');
          redirect('admin/programs');
      }
   }



     public function zulallar()
     {
        $result = $this->dtbs->list('zulallar');
        $data['info'] = $result;
        $this->load->view('back/zulallar/anasehife',$data);
     }

     public function zulal_add()
     {
       $result = $this->dtbs->list('zulallar');
       $data['info'] = $result;
       $this->load->view('back/zulallar/insert/anasehife', $data);
     }

     public function zulal_insert()
     {
       $config['upload_path']   = FCPATH.'assets/front/images/zulallar';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/zulallar/'.$image_path.'';
           $image_tmb                = 'assets/front/images/zulallar/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/zulallar/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/zulallar/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
            $data =  [
                      'image'        => $image_save,
                      'tmb'          => $image_tmb,
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status = 0
                    ];
            $result = $this->dtbs->insert('zulallar',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/zulallar');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Əlavə Edilmədi
                                                       </div>');
                redirect('admin/zulallar');
            }

       }
     }

     public function zulal_update($id)
     {
         $result       = $this->dtbs->show($id,'zulallar');
         $data['info'] = $result;
         $this->load->view('back/zulallar/edit/anasehife',$data);
     }


     public function zulal_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');

         $config['upload_path']   = FCPATH.'assets/front/images/zulallar';
         $config['allowed_types'] = '*';
         $config['encrypt_name']  = TRUE;
         $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/zulallar/'.$image_path.'';
           $image_tmb                = 'assets/front/images/zulallar/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/zulallar/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/zulallar/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
           
           $image_delete      = zulal_image($id);
           $tmb_image_delete  = zulal_tmb_image($id);
           unlink($image_delete);
           unlink($tmb_image_delete);

            $data = [
                      'image'         => $image_save,
                      'tmb'           => $image_tmb,
                      'protein_name'  => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'           => permalink($this->input->post('protein_name')),
                      'price'         => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','zulallar');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/zulallar');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/zulallar');
            }

        }
        else
        {
            $data = [
                      'id'           => $this->input->post('id'),
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','zulallar');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/zulallar');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/zulallar');
            }

        }

     }

       public function zulal_delete($id,$where,$from)
       {

          $image_delete      = zulal_image($id);
          $tmb_image_delete  = zulal_tmb_image($id);
          unlink($image_delete);
          unlink($tmb_image_delete);

          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Silindi.. 
                                                       </div>');
              redirect('admin/zulallar');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Silinmədi.. 
                                                       </div>');
              redirect('admin/zulallar');
          }
       }

     public function amin_tursulari()
     {
        $result = $this->dtbs->list('amin_tursulari');
        $data['info'] = $result;
        $this->load->view('back/amin_tursulari/anasehife',$data);
     }

     public function amin_tursu_add()
     {
       $result = $this->dtbs->list('amin_tursulari');
       $data['info'] = $result;
       $this->load->view('back/amin_tursulari/insert/anasehife', $data);
     }

     public function amin_tursu_insert()
     {
       $config['upload_path']   = FCPATH.'assets/front/images/amin_tursulari';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/amin_tursulari/'.$image_path.'';
           $image_tmb                = 'assets/front/images/amin_tursulari/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/amin_tursulari/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/amin_tursulari/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
            $data =  [
                      'image'        => $image_save,
                      'tmb'          => $image_tmb,
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status = 0
                    ];
            $result = $this->dtbs->insert('amin_tursulari',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/amin_tursulari');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Əlavə Edilmədi
                                                       </div>');
                redirect('admin/amin_tursulari');
            }

       }
     }

     public function amin_tursu_update($id)
     {
         $result       = $this->dtbs->show($id,'amin_tursulari');
         $data['info'] = $result;
         $this->load->view('back/amin_tursulari/edit/anasehife',$data);
     }


     public function amin_tursu_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');

         $config['upload_path']   = FCPATH.'assets/front/images/amin_tursulari';
         $config['allowed_types'] = '*';
         $config['encrypt_name']  = TRUE;
         $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/amin_tursulari/'.$image_path.'';
           $image_tmb                = 'assets/front/images/amin_tursulari/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/amin_tursulari/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/amin_tursulari/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
           
           $image_delete      = amin_tursu_image($id);
           $tmb_image_delete  = amin_tursu_tmb_image($id);
           unlink($image_delete);
           unlink($tmb_image_delete);

            $data = [
                      'image'         => $image_save,
                      'tmb'           => $image_tmb,
                      'protein_name'  => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'           => permalink($this->input->post('protein_name')),
                      'price'         => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','amin_tursulari');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/amin_tursulari');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/amin_tursulari');
            }

        }
        else
        {
            $data = [
                      'id'           => $this->input->post('id'),
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','amin_tursulari');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/amin_tursulari');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/amin_tursulari');
            }

        }

     }

       public function amin_tursu_delete($id,$where,$from)
       {

          $image_delete      = amin_tursu_image($id);
          $tmb_image_delete  = amin_tursu_tmb_image($id);
          unlink($image_delete);
          unlink($tmb_image_delete);

          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Silindi.. 
                                                       </div>');
              redirect('admin/amin_tursulari');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Silinmədi.. 
                                                       </div>');
              redirect('admin/amin_tursulari');
          }
       }

     public function yag_yandiranlar()
     {
        $result = $this->dtbs->list('yag_yandiranlar');
        $data['info'] = $result;
        $this->load->view('back/yag_yandiranlar/anasehife',$data);
     }

     public function yag_yandiran_add()
     {
       $result = $this->dtbs->list('yag_yandiranlar');
       $data['info'] = $result;
       $this->load->view('back/yag_yandiranlar/insert/anasehife', $data);
     }

     public function yag_yandiran_insert()
     {
       $config['upload_path']   = FCPATH.'assets/front/images/yag_yandiranlar';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/yag_yandiranlar/'.$image_path.'';
           $image_tmb                = 'assets/front/images/yag_yandiranlar/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/yag_yandiranlar/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/yag_yandiranlar/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
            $data =  [
                      'image'        => $image_save,
                      'tmb'          => $image_tmb,
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status = 0
                    ];
            $result = $this->dtbs->insert('yag_yandiranlar',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/yag_yandiranlar');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Əlavə Edilmədi
                                                       </div>');
                redirect('admin/yag_yandiranlar');
            }

       }
     }

     public function yag_yandiran_update($id)
     {
         $result       = $this->dtbs->show($id,'yag_yandiranlar');
         $data['info'] = $result;
         $this->load->view('back/yag_yandiranlar/edit/anasehife',$data);
     }


     public function yag_yandiran_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');

         $config['upload_path']   = FCPATH.'assets/front/images/yag_yandiranlar';
         $config['allowed_types'] = '*';
         $config['encrypt_name']  = TRUE;
         $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/yag_yandiranlar/'.$image_path.'';
           $image_tmb                = 'assets/front/images/yag_yandiranlar/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/yag_yandiranlar/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/yag_yandiranlar/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
           
           $image_delete      = yag_yandiranlar_image($id);
           $tmb_image_delete  = yag_yandiranlar_tmb_image($id);
           unlink($image_delete);
           unlink($tmb_image_delete);

            $data = [
                      'image'         => $image_save,
                      'tmb'           => $image_tmb,
                      'protein_name'  => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'           => permalink($this->input->post('protein_name')),
                      'price'         => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','yag_yandiranlar');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/yag_yandiranlar');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/yag_yandiranlar');
            }

        }
        else
        {
            $data = [
                      'id'           => $this->input->post('id'),
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','yag_yandiranlar');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/yag_yandiranlar');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/yag_yandiranlar');
            }

        }

     }

       public function yag_yandiran_delete($id,$where,$from)
       {

          $image_delete      = yag_yandiranlar_image($id);
          $tmb_image_delete  = yag_yandiranlar_tmb_image($id);
          unlink($image_delete);
          unlink($tmb_image_delete);

          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Silindi.. 
                                                       </div>');
              redirect('admin/yag_yandiranlar');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Silinmədi.. 
                                                       </div>');
              redirect('admin/yag_yandiranlar');
          }
       }


     public function vitaminler()
     {
        $result = $this->dtbs->list('vitaminler');
        $data['info'] = $result;
        $this->load->view('back/vitaminler/anasehife',$data);
     }

     public function vitamin_add()
     {
       $result = $this->dtbs->list('vitaminler');
       $data['info'] = $result;
       $this->load->view('back/vitaminler/insert/anasehife', $data);
     }

     public function vitamin_insert()
     {
       $config['upload_path']   = FCPATH.'assets/front/images/vitaminler';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/vitaminler/'.$image_path.'';
           $image_tmb                = 'assets/front/images/vitaminler/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/vitaminler/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/vitaminler/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
            $data =  [
                      'image'        => $image_save,
                      'tmb'          => $image_tmb,
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status = 0
                    ];
            $result = $this->dtbs->insert('vitaminler',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/vitaminler');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Əlavə Edilmədi
                                                       </div>');
                redirect('admin/vitaminler');
            }

       }
     }

     public function vitamin_update($id)
     {
         $result       = $this->dtbs->show($id,'vitaminler');
         $data['info'] = $result;
         $this->load->view('back/vitaminler/edit/anasehife',$data);
     }


     public function vitamin_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');

         $config['upload_path']   = FCPATH.'assets/front/images/vitaminler';
         $config['allowed_types'] = '*';
         $config['encrypt_name']  = TRUE;
         $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/vitaminler/'.$image_path.'';
           $image_tmb                = 'assets/front/images/vitaminler/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/vitaminler/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/vitaminler/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
           
           $image_delete      = vitamin_image($id);
           $tmb_image_delete  = vitamin_tmb_image($id);
           unlink($image_delete);
           unlink($tmb_image_delete);

            $data = [
                      'image'         => $image_save,
                      'tmb'           => $image_tmb,
                      'protein_name'  => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'           => permalink($this->input->post('protein_name')),
                      'price'         => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','vitaminler');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/vitaminler');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/vitaminler');
            }

        }
        else
        {
            $data = [
                      'id'           => $this->input->post('id'),
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','vitaminler');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/vitaminler');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/vitaminler');
            }

        }

     }

       public function vitamin_delete($id,$where,$from)
       {

          $image_delete      = vitamin_image($id);
          $tmb_image_delete  = vitamin_tmb_image($id);
          unlink($image_delete);
          unlink($tmb_image_delete);

          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Silindi.. 
                                                       </div>');
              redirect('admin/vitaminler');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Silinmədi.. 
                                                       </div>');
              redirect('admin/vitaminler');
          }
       }


     public function ceki_ve_hecm()
     {
        $result = $this->dtbs->list('ceki_hecm');
        $data['info'] = $result;
        $this->load->view('back/ceki_ve_hecm/anasehife',$data);
     }

     public function ceki_ve_hecm_add()
     {
       $result = $this->dtbs->list('ceki_hecm');
       $data['info'] = $result;
       $this->load->view('back/ceki_ve_hecm/insert/anasehife', $data);
     }

     public function ceki_ve_hecm_insert()
     {
       $config['upload_path']   = FCPATH.'assets/front/images/ceki_ve_hecm';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/ceki_ve_hecm/'.$image_path.'';
           $image_tmb                = 'assets/front/images/ceki_ve_hecm/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/ceki_ve_hecm/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/ceki_ve_hecm/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
            $data =  [
                      'image'        => $image_save,
                      'tmb'          => $image_tmb,
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status = 0
                    ];
            $result = $this->dtbs->insert('ceki_hecm',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/ceki_ve_hecm');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Əlavə Edilmədi
                                                       </div>');
                redirect('admin/ceki_ve_hecm');
            }

       }
     }

     public function ceki_ve_hecm_update($id)
     {
         $result       = $this->dtbs->show($id,'ceki_hecm');
         $data['info'] = $result;
         $this->load->view('back/ceki_ve_hecm/edit/anasehife',$data);
     }


     public function ceki_ve_hecm_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');

         $config['upload_path']   = FCPATH.'assets/front/images/ceki_ve_hecm';
         $config['allowed_types'] = '*';
         $config['encrypt_name']  = TRUE;
         $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/ceki_ve_hecm/'.$image_path.'';
           $image_tmb                = 'assets/front/images/ceki_ve_hecm/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/ceki_ve_hecm/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/ceki_ve_hecm/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
           
           $image_delete      = ceki_ve_hecm_image($id);
           $tmb_image_delete  = ceki_ve_hecm_tmb_image($id);
           unlink($image_delete);
           unlink($tmb_image_delete);

            $data = [
                      'image'         => $image_save,
                      'tmb'           => $image_tmb,
                      'protein_name'  => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'           => permalink($this->input->post('protein_name')),
                      'price'         => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','ceki_hecm');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/ceki_ve_hecm');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/ceki_ve_hecm');
            }

        }
        else
        {
            $data = [
                      'id'           => $this->input->post('id'),
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','ceki_hecm');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/ceki_ve_hecm');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/ceki_ve_hecm');
            }

        }

     }

       public function ceki_ve_hecm_delete($id,$where,$from)
       {

          $image_delete      = ceki_ve_hecm_image($id);
          $tmb_image_delete  = ceki_ve_hecm_tmb_image($id);
          unlink($image_delete);
          unlink($tmb_image_delete);

          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Silindi.. 
                                                       </div>');
              redirect('admin/ceki_ve_hecm');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Silinmədi.. 
                                                       </div>');
              redirect('admin/ceki_ve_hecm');
          }
       }


     public function guc_enerji()
     {
        $result = $this->dtbs->list('guc_enerji');
        $data['info'] = $result;
        $this->load->view('back/guc_ve_enerji/anasehife',$data);
     }

     public function guc_enerji_add()
     {
       $result = $this->dtbs->list('guc_enerji');
       $data['info'] = $result;
       $this->load->view('back/guc_ve_enerji/insert/anasehife', $data);
     }

     public function guc_enerji_insert()
     {
       $config['upload_path']   = FCPATH.'assets/front/images/guc_enerji';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/guc_enerji/'.$image_path.'';
           $image_tmb                = 'assets/front/images/guc_enerji/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/guc_enerji/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/guc_enerji/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
            $data =  [
                      'image'        => $image_save,
                      'tmb'          => $image_tmb,
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status = 0
                    ];
            $result = $this->dtbs->insert('guc_enerji',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/guc_enerji');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Əlavə Edilmədi
                                                       </div>');
                redirect('admin/guc_enerji');
            }

       }
     }

     public function guc_enerji_update($id)
     {
         $result       = $this->dtbs->show($id,'guc_enerji');
         $data['info'] = $result;
         $this->load->view('back/guc_ve_enerji/edit/anasehife',$data);
     }


     public function guc_enerji_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');

         $config['upload_path']   = FCPATH.'assets/front/images/guc_enerji';
         $config['allowed_types'] = '*';
         $config['encrypt_name']  = TRUE;
         $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/guc_enerji/'.$image_path.'';
           $image_tmb                = 'assets/front/images/guc_enerji/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/guc_enerji/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/guc_enerji/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
           
           $image_delete      = guc_enerji_image($id);
           $tmb_image_delete  = guc_enerji_tmb_image($id);
           unlink($image_delete);
           unlink($tmb_image_delete);

            $data = [
                      'image'         => $image_save,
                      'tmb'           => $image_tmb,
                      'protein_name'  => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'           => permalink($this->input->post('protein_name')),
                      'price'         => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','guc_enerji');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/guc_enerji');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/guc_enerji');
            }

        }
        else
        {
            $data = [
                      'id'           => $this->input->post('id'),
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','guc_enerji');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/guc_enerji');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/guc_enerji');
            }

        }

     }

       public function guc_enerji_delete($id,$where,$from)
       {

          $image_delete      = guc_enerji_image($id);
          $tmb_image_delete  = guc_enerji_tmb_image($id);
          unlink($image_delete);
          unlink($tmb_image_delete);

          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Silindi.. 
                                                       </div>');
              redirect('admin/guc_enerji');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Silinmədi.. 
                                                       </div>');
              redirect('admin/guc_enerji');
          }
       }


     public function diger_mehsullar()
     {
        $result = $this->dtbs->list('diger_mehsullar');
        $data['info'] = $result;
        $this->load->view('back/diger_mehsullar/anasehife',$data);
     }

     public function diger_mehsullar_add()
     {
       $result = $this->dtbs->list('diger_mehsullar');
       $data['info'] = $result;
       $this->load->view('back/diger_mehsullar/insert/anasehife', $data);
     }

     public function diger_mehsullar_insert()
     {
       $config['upload_path']   = FCPATH.'assets/front/images/diger_mehsullar';
       $config['allowed_types'] = '*';
       $config['encrypt_name']  = TRUE;
       $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/diger_mehsullar/'.$image_path.'';
           $image_tmb                = 'assets/front/images/diger_mehsullar/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/diger_mehsullar/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/diger_mehsullar/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
            $data =  [
                      'image'        => $image_save,
                      'tmb'          => $image_tmb,
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status = 0
                    ];
            $result = $this->dtbs->insert('diger_mehsullar',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Əlavə Edildi.. 
                                                       </div>');
                redirect('admin/diger_mehsullar');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Əlavə Edilmədi
                                                       </div>');
                redirect('admin/diger_mehsullar');
            }

       }
     }

     public function diger_mehsullar_update($id)
     {
         $result       = $this->dtbs->show($id,'diger_mehsullar');
         $data['info'] = $result;
         $this->load->view('back/diger_mehsullar/edit/anasehife',$data);
     }


     public function diger_mehsullar_edit()
     {
         $id     = $this->input->post('id');
         $status = $this->input->post('status');

         $config['upload_path']   = FCPATH.'assets/front/images/diger_mehsullar';
         $config['allowed_types'] = '*';
         $config['encrypt_name']  = TRUE;
         $this->load->library('upload', $config);
         
         if($this->upload->do_upload('image'))
         {
           //tmb operation start
           $image                    = $this->upload->data();
           $image_path               = $image['file_name'];
           $image_save               = 'assets/front/images/diger_mehsullar/'.$image_path.'';
           $image_tmb                = 'assets/front/images/diger_mehsullar/tmb/'.$image_path.'';
           $config['image_library']  = 'gd2';
           $config['source_image']   = 'assets/front/images/diger_mehsullar/'.$image_path.'';
           $config['new_image']      = 'assets/front/images/diger_mehsullar/tmb/'.$image_path.'';
           $config['create_thumb']   = false;
           $config['maintain_ratio'] = false;
           $config['quality']        = '60%';
           $config['width']          = 800;
           $config['height']         = 500;
           $this->load->library('image_lib',$config);
           $this->image_lib->initialize($config);
           $this->image_lib->resize();
           $this->image_lib->clear();
           //tmb operation end
           
           $image_delete      = diger_mehsullar_image($id);
           $tmb_image_delete  = diger_mehsullar_tmb_image($id);
           unlink($image_delete);
           unlink($tmb_image_delete);

            $data = [
                      'image'         => $image_save,
                      'tmb'           => $image_tmb,
                      'protein_name'  => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'           => permalink($this->input->post('protein_name')),
                      'price'         => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'          => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'        => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','diger_mehsullar');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/diger_mehsullar');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/diger_mehsullar');
            }

        }
        else
        {
            $data = [
                      'id'           => $this->input->post('id'),
                      'protein_name' => trim(strip_tags(htmlspecialchars($this->input->post('protein_name')))),
                      'sef'          => permalink($this->input->post('protein_name')),
                      'price'        => trim(strip_tags(htmlspecialchars($this->input->post('price')))),
                      'info'         => trim(strip_tags(htmlspecialchars($this->input->post('info')))),
                      'status'       => $status
                    ];
            $result = $this->dtbs->update($data,$id,'id','diger_mehsullar');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Yeniləndi.. 
                                                       </div>');
              redirect('admin/diger_mehsullar');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Yenilənmədi.. 
                                                       </div>');
              redirect('admin/diger_mehsullar');
            }

        }

     }

       public function diger_mehsullar_delete($id,$where,$from)
       {

          $image_delete      = diger_mehsullar_image($id);
          $tmb_image_delete  = diger_mehsullar_tmb_image($id);
          unlink($image_delete);
          unlink($tmb_image_delete);

          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Protein Silindi.. 
                                                       </div>');
              redirect('admin/diger_mehsullar');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Protein Silinmədi.. 
                                                       </div>');
              redirect('admin/diger_mehsullar');
          }
       }


     public function qeydiyyat()
     {
       $result = $this->dtbs->qeydiyyat_list('qeydiyyat');
       $data['info'] = $result;
       $this->load->view('back/qeydiyyat/anasehife', $data);
     }

     public function vaxti_bitenler()
     {
       $result = $this->dtbs->vaxti_bitenler('qeydiyyat');
       $data['info'] = $result;
       $this->load->view('back/vaxti_bitenler/anasehife', $data);
     }

     public function qeydiyyat_add()
     {
       $result = $this->dtbs->list('qeydiyyat');
       $data['info'] = $result;
       $this->load->view('back/qeydiyyat/insert/anasehife', $data);
     }


     public function qeydiyyat_insert()
     {
            $data =  [
                      'fullname'    => trim(strip_tags(htmlspecialchars($this->input->post('fullname')))),
                      'quantity'    => trim(strip_tags(htmlspecialchars($this->input->post('quantity')))),
                      'start_date'  => trim(strip_tags(htmlspecialchars($this->input->post('start_date')))),
                      'end_date'    => trim(strip_tags(htmlspecialchars($this->input->post('end_date')))),
                      'gender'      => $this->input->post('gender')
                    ];
            $result = $this->dtbs->insert('qeydiyyat',$data);
            if($result)
            {
                $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Qeydiyyat Tamamlandı 
                                                       </div>');
                redirect('admin/qeydiyyat');
            }
            else
            {
                $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Qeydiyyat Tamamlanmadı
                                                       </div>');
                redirect('admin/qeydiyyat');
            }
     }


     public function qeydiyyat_update($id)
     {
         $result       = $this->dtbs->show($id,'qeydiyyat');
         $data['info'] = $result;
         $this->load->view('back/qeydiyyat/edit/anasehife',$data);
     }


     public function qeydiyyat_edit()
     {
         $id     = $this->input->post('id');
          
          $data = [
                      'fullname'    => trim(strip_tags(htmlspecialchars($this->input->post('fullname')))),
                      'quantity'    => trim(strip_tags(htmlspecialchars($this->input->post('quantity')))),
                      'start_date'  => trim(strip_tags(htmlspecialchars($this->input->post('start_date')))),
                      'end_date'    => trim(strip_tags(htmlspecialchars($this->input->post('end_date')))),
                      'gender'      => $this->input->post('gender')
                  ];
            $result = $this->dtbs->update($data,$id,'id','qeydiyyat');
            if($result)
            {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Qeydiyyat Yeniləndi
                                                       </div>');
              redirect('admin/qeydiyyat');
            }
            else
            {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Qeydiyyat Yenilənmədi 
                                                       </div>');
              redirect('admin/qeydiyyat');
            }

     }

       public function qeydiyyat_delete($id,$where,$from)
       {
          $result = $this->dtbs->delete($id,$where,$from);
          if($result)
          {
              $this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Başarılı!</strong><br>
                                                        Qeydiyyat Silindi.. 
                                                       </div>');
              redirect('admin/qeydiyyat');
          }
          else
          {
              $this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissable 
                                                     fade show">
                                                        <button class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        <strong>Xətalı!</strong><br>
                                                        Qeydiyyat Silinmədi.. 
                                                       </div>');
              redirect('admin/qeydiyyat');
          }
       }


     public function gundelik_qeydiyyat()
     {
       $result = $this->dtbs->gundelik_qeydiyyat('qeydiyyat');
       $data['info'] = $result;
       $this->load->view('back/gundelik_qeydiyyat/anasehife', $data);
     }




}
