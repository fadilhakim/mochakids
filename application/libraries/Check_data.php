<?php

	class Check_data
	{
		
		function check_email_user($email)
		{
			$CI =& get_instance();
			
			$str = "SELECT * FROM user_tbl WHERE email = '$email' ";
			$q = $CI->db->query($str);
			$f = $q->row_array();
			
			if(!empty($f))
			{
				$result = FALSE;	
			}
			else
			{
				$result = TRUE;	
			}
			
			return $result;
			
		}
		
		
		
	}