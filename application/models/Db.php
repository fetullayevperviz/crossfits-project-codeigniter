<?php 
    class Db extends CI_Model
    {
       function single($from, $where = array())
       {
       	  $result = $this
		       	       ->db
		       	       ->from($from)
		       	       ->where($where)
		       	       ->get()
		       	       ->row();
       	return $result;
       }

       function upload_data($from,$where=array(),$data=array())
       {
          $result = $this
                         ->db
                         ->where($where)
                         ->update($from,$data);
          return $result;
       }

    function rand_image()
    {
        $result = $this
                     ->db
                     ->select('*')
                     ->from('slider')
                     ->where('status',1)
                     ->order_by('rand()')
                     ->limit('1')
                     ->get()
                     ->result_array();
        return $result;
    }

       function info()
       {
          $result = $this
                         ->db
                         ->select('*')
                         ->from('settings')
                         ->get()
                         ->row_array();
          return $result;
       }

    }
 ?>