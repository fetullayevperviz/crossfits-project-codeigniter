<?php 
     function protein_sub_menu()
     {
     	$CI =& get_instance();
     	$result = $CI
     	             ->db
     	             ->select('*')
     	             ->from('protein_sub_menu')
     	             ->get()
     	             ->result_array();
     	return $result;
     }  

    function site_settings()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('*')
                     ->from('settings')
                     ->get()
                     ->result_array();
        return $result;
    }  

     function social_media()
     {
          $CI =& get_instance();
          $result = $CI
                       ->db
                       ->select('*')
                       ->from('social_media')
                       ->get()
                       ->result_array();
          return $result;
     } 

    function slider()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('*')
                     ->from('slider')
                     ->where('status',1)
                     ->order_by('rand()')
                     ->limit('10')
                     ->get()
                     ->result_array();
        return $result;
    }

    function gallery_slider()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('*')
                     ->from('qalereya')
                     ->where('status',1)
                     ->order_by('rand()')
                     ->limit('10')
                     ->get()
                     ->result_array();
        return $result;
    }
    

    function gallery()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('*')
                     ->from('qalereya')
                     ->where('status',1)
                     ->order_by('id','desc')
                     ->limit('30')
                     ->get()
                     ->result_array();
        return $result;
    }


    function triner_slider()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('*')
                     ->from('triner')
                     ->where('status',1)
                     ->order_by('id','desc')
                     ->get()
                     ->result_array();
        return $result;
    }

    

    function son_programlar()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('*')
                     ->from('programs')
                     ->where('status',1)
                     ->order_by('id','desc')
                     ->limit('6')
                     ->get()
                     ->result_array();
        return $result;
    }

    function exercises()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('*')
                     ->from('exercises')
                     ->where('status',1)
                     ->order_by('id','desc')
                     ->limit('18')
                     ->get()
                     ->result_array();
        return $result;
    }

    function testimiones()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('*')
                     ->from('testimiones')
                     ->where('status',1)
                     ->order_by('id','desc')
                     ->get()
                     ->result_array();
        return $result;
    }

    function programs()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('*')
                     ->from('programs')
                     ->where('status',1)
                     ->order_by('id','desc')
                     ->get()
                     ->result_array();
        return $result;
    }

    function zulallar()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('*')
                     ->from('zulallar')
                     ->where('status',1)
                     ->order_by('id','desc')
                     ->get()
                     ->result_array();
        return $result;
    }

    function yag_yandiranlar()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('*')
                     ->from('yag_yandiranlar')
                     ->where('status',1)
                     ->order_by('id','desc')
                     ->get()
                     ->result_array();
        return $result;
    }

    function vitaminler()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('*')
                     ->from('vitaminler')
                     ->where('status',1)
                     ->order_by('id','desc')
                     ->get()
                     ->result_array();
        return $result;
    }

    function guc_enerji()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('*')
                     ->from('guc_enerji')
                     ->where('status',1)
                     ->order_by('id','desc')
                     ->get()
                     ->result_array();
        return $result;
    }

    function diger_mehsullar()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('*')
                     ->from('diger_mehsullar')
                     ->where('status',1)
                     ->order_by('id','desc')
                     ->get()
                     ->result_array();
        return $result;
    }

    function ceki_hecm()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('*')
                     ->from('ceki_hecm')
                     ->where('status',1)
                     ->order_by('id','desc')
                     ->get()
                     ->result_array();
        return $result;
    }

    function amin_tursulari()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('*')
                     ->from('amin_tursulari')
                     ->where('status',1)
                     ->order_by('id','desc')
                     ->get()
                     ->result_array();
        return $result;
    }

    function triner()
    {
        $CI =& get_instance();
        $result = $CI
                     ->db
                     ->select('*')
                     ->from('triner')
                     ->where('status',1)
                     ->order_by('id','desc')
                     ->get()
                     ->result_array();
        return $result;
    }

 ?>