<?php

if(!function_exists("paging"))
{
  function paging($arr)
  {
	  error_reporting(E_ALL);
	  
	  $CI =& get_instance();
		
	  $CI->load->library("pagination");
			
	  $limit = $arr["limit"];
	  
	  $config['base_url'] = $arr["base_url"];
	  $config['total_rows'] = $arr["total_rows"];
	  
	  $config['per_page']   	      = $limit;
	  $config["page_query_string"] 	  = TRUE;
	  $config["use_page_numbers"]  	  = TRUE;
	  $config['enable_query_strings'] = TRUE;
	  $config['query_string_segment'] = "p";
	  //$config["num_links"] 			= 1;
	  //$config['use_rsegment'] 		= TRUE;
	  
	  $config["full_tag_open"]   = "<div class='btn-group' role='group'>";
	  $config["full_tag_close"]  = "</div>";
	  
	  $config["first_link"] 	 = "First";
	  $config["first_tag_open"]  = "<div class='btn btn-default'>";
	  $config["first_tag_close"] = "</div>";
	  
	  $config["last_link"] 	     = "Last";
	  $config["last_tag_open"]   = "<div class='btn btn-default'>";
	  $config["last_tag_close"]  = "</div>";
	  
	  $config["next_link"] 	    = "&gt;";
	  $config["next_tag_open"]  = "<div class='btn btn-default'>";
	  $config["next_tag_close"] = "</div>";
	  
	  $config["prev_link"] 	    = "&lt;";
	  $config["prev_tag_open"]  = "<div class='btn btn-default'>";
	  $config["prev_tag_close"] = "</div>";
	  
	  $config["num_tag_open"]  = "<div class='btn btn-default'>";
	  $config["num_tag_close"] = "</div>";
	  
	  $config["cur_tag_open"]  = "<div class='btn btn-default'>";
	  $config["cur_tag_close"] = "</div>";
	  
	  $CI->pagination->initialize($config);
	 
	  
	  return $CI->pagination->create_links();
  }
}
