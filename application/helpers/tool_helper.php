<?php 
     function session($type,$name,$message=null)
     {
        $CI =& get_instance();
        if($type == 'read')
        {
            return $CI->session->userdata($name);
        }
        if($type == 'write')
        {
           return $CI->session->set_userdata($name,$message);
        }
     }

     function flash($type,$title,$message)
     {
     	$CI =& get_instance();
     	$flash = '<div class="alert alert-'.$type.' alert-dismissable fade show">
	                    <button class="close" data-dismiss="alert" aria-label="Close">
	                    </button><strong>'.$title.'</strong><br>'.$message.'</div>';
	    return $CI->session->set_flashdata('message',$flash);
     }

     function flash_read()
     {
     	$CI =& get_instance();
     	return $CI->session->flashdata('message');
     }

     function linkto($url)
     { 
        return base_url($url);
     }

     function post_val($name)
     {
        $CI =& get_instance();
        return trim(strip_tags(htmlspecialchars($CI->input->post($name))));
     }

   
function permalink($string) 
{
    $find = array('Ç', 'Ş', 'Ğ', 'Ü','U', 'İ','I', 'Ö','Ə','O', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı','ə', '+', '#');
    $replace = array('c', 's', 'g', 'u','u', 'i','i', 'o','e', 'o', 'c', 's', 'g', 'u', 'o', 'i','e', 'plus', 'sharp');
    $string = strtolower(str_replace($find, $replace, $string));
    $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
    $string = trim(preg_replace('/\s+/', ' ', $string));
    $string = str_replace(' ', '-', $string);
    return $string;   
}

 function gundelik_hesabat()
 {
    $CI =& get_instance();
    $result = $CI->db->select('*')->from('qeydiyyat')->where('start_date',date('Y-m-d'))->get->result_array();
    return $result;
 }

 function category_list()
 {
    $CI =& get_instance();
    $result = $CI->db->select('*')->from('category')->order_by('id','asc')->get()->result_array();
    return $result;
 }

 function k_yazar_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->from('k_yazar')->where('id',$id)->get()->row();
    return $result->image;
 }

 function k_yazar_mini_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->select('mini')->from('k_yazar')->where('id',$id)->get()->row();
    return $result->mini;
 }

function slider_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->from('slider')->where('id',$id)->get()->row();
    return $result->image;
 }

 function slider_tmb_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->select('tmb')->from('slider')->where('id',$id)->get()->row();
    return $result->tmb;
 }

 function zulal_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->from('zulallar')->where('id',$id)->get()->row();
    return $result->image;
 }

 function zulal_tmb_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->select('tmb')->from('zulallar')->where('id',$id)->get()->row();
    return $result->tmb;
 }

 function yag_yandiranlar_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->from('yag_yandiranlar')->where('id',$id)->get()->row();
    return $result->image;
 }

 function yag_yandiranlar_tmb_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->select('tmb')->from('yag_yandiranlar')->where('id',$id)->get()->row();
    return $result->tmb;
 }

 function vitamin_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->from('vitaminler')->where('id',$id)->get()->row();
    return $result->image;
 }

 function vitamin_tmb_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->select('tmb')->from('vitaminler')->where('id',$id)->get()->row();
    return $result->tmb;
 }

 function ceki_ve_hecm_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->from('ceki_hecm')->where('id',$id)->get()->row();
    return $result->image;
 }

 function ceki_ve_hecm_tmb_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->select('tmb')->from('ceki_hecm')->where('id',$id)->get()->row();
    return $result->tmb;
 }

 function guc_enerji_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->from('guc_enerji')->where('id',$id)->get()->row();
    return $result->image;
 }

 function guc_enerji_tmb_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->select('tmb')->from('guc_enerji')->where('id',$id)->get()->row();
    return $result->tmb;
 }

function diger_mehsullar_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->from('diger_mehsullar')->where('id',$id)->get()->row();
    return $result->image;
 }

 function diger_mehsullar_tmb_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->select('tmb')->from('diger_mehsullar')->where('id',$id)->get()->row();
    return $result->tmb;
 }

 function amin_tursu_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->from('amin_tursulari')->where('id',$id)->get()->row();
    return $result->image;
 }

 function amin_tursu_tmb_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->select('tmb')->from('amin_tursulari')->where('id',$id)->get()->row();
    return $result->tmb;
 }

 function programs_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->from('programs')->where('id',$id)->get()->row();
    return $result->image;
 }

 function programs_tmb_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->select('tmb')->from('programs')->where('id',$id)->get()->row();
    return $result->tmb;
 }

 function triner_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->from('triner')->where('id',$id)->get()->row();
    return $result->image;
 }

 function triner_tmb_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->select('tmb')->from('triner')->where('id',$id)->get()->row();
    return $result->tmb;
 }

 function qalereya_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->from('qalereya')->where('id',$id)->get()->row();
    return $result->image;
 }

 function qalereya_tmb_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->select('tmb')->from('qalereya')->where('id',$id)->get()->row();
    return $result->tmb;
 }

 function testimiones_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->from('testimiones')->where('id',$id)->get()->row();
    return $result->image;
 }

 function testimiones_tmb_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->select('tmb')->from('testimiones')->where('id',$id)->get()->row();
    return $result->tmb;
 }

 function exercises_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->from('exercises')->where('id',$id)->get()->row();
    return $result->image;
 }

 function exercises_tmb_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->select('tmb')->from('exercises')->where('id',$id)->get()->row();
    return $result->tmb;
 }



 function user_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->from('admin')->where('id',$id)->get()->row();
    return $result->image;
 }

 function user_tmb_image($id)
 {
    $CI =& get_instance();
    $result = $CI->db->select('tmb')->from('admin')->where('id',$id)->get()->row();
    return $result->tmb;
 }

 function getIP()
 {
    if(getenv("HTTP_CLIENT_IP"))
    {
        $ip = getenv("HTTP_CLIENT_IP");
    }
    elseif(getenv("HTTP_X_FORWARDED_FOR"))
    {
       $ip = getenv("HTTP_X_FORWARDED_FOR");
       if(strstr($ip,','))
       {
          $tmp = explode($ip, ',');
          $ip = trim($tmp[0]);
       }
    }
    else
    {
        $ip = getenv("REMOTE_ADDR");
    }
    return $ip;
 }


function gallery1()
{
    $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('news')
                 ->where('status',1)
                 ->order_by('rand()')
                 ->limit('10')
                 ->get()
                 ->result_array();
    return $result;
}

function qeydiyyat_count()
{
    $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('qeydiyyat')
                 ->count_all_results();
    return $result;
}

function slider_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('slider')
                 ->count_all_results();
    return $result;
}

function message_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('message')
                 ->where('status',0)
                 ->count_all_results();
    return $result;
}

function social_media_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('social_media')
                 ->count_all_results();
    return $result;
}

function exercises_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('exercises')
                 ->count_all_results();
    return $result;
}

function testimiones_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('testimiones')
                 ->count_all_results();
    return $result;
}

function zulal_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('zulallar')
                 ->count_all_results();
    return $result;
}

function amin_tursulari_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('amin_tursulari')
                 ->count_all_results();
    return $result;
}

function yag_yandiranlar_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('yag_yandiranlar')
                 ->count_all_results();
    return $result;
}

function vitaminler_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('vitaminler')
                 ->count_all_results();
    return $result;
}

function ceki_hecm_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('ceki_hecm')
                 ->count_all_results();
    return $result;
}

function guc_enerji_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('guc_enerji')
                 ->count_all_results();
    return $result;
}

function diger_mehsullar_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('diger_mehsullar')
                 ->count_all_results();
    return $result;
}

function programs_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('programs')
                 ->count_all_results();
    return $result;
}

function gallery_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('qalereya')
                 ->count_all_results();
    return $result;
}

function triner_count()
{
   $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('triner')
                 ->count_all_results();
    return $result;
}

function news_category($cat_id)
{
    $CI =& get_instance();
    $result = $CI
                 ->db
                 ->select('*')
                 ->from('category')
                 ->join('news','news.category=category.title','inner')
                 ->where('news.cat_id',$cat_id)
                 ->where('news.status','1')
                 ->order_by('news.hit','desc')
                 ->limit('5')
                 ->get()
                 ->result_array();
    return $result;
}



 ?>