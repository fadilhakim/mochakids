<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class update extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->load->model('model_update');
		$this->load->library("Upload2");
	}

	function update_slider() {

			$slider_id 		  = $this->input->post('slider_id');
			$slider_title 	  = $this->input->post('slider_title');
			$slider_link 	  = $this->input->post('slider_link');
			$slider_image_old = $this->input->post('silder_image_old');

			$slider_image_new = $_FILES['silder_image_new']['name'];

			/* $config = array(

				'upload_path' => "./assets/image/slider",
				'allowed_types' => "gif|jpg|png|jpeg|pdf",
				'remove_spaces' => FALSE,
				'overwrite' => TRUE,
				'max_size' => "2048000",
				'max_height' => "2200",
				'max_width' => "2200"

			); */

			if ($slider_image_new == '') {

				$data = array(

				  'slider_title' => $slider_title,
				  'silder_image' => $slider_image_old,
				  'slider_link' => $slider_link

				);

				$this->model_update->update_slider($slider_id,$data);
			}
			else {

			$data = array(

				'slider_title' => $slider_title,
				'silder_image' => $slider_image_new,
				'slider_link' => $slider_link

			);

			/* $this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('assets/image/slider');*/

			$new_path = "assets/image/slider";
			if(!empty($slider_image_new))
			{
				$arr3["new_path"] = $new_path;
				$arr3["element"]  = "silder_image_new";
				$c = $this->upload2->upload_process($arr3);
			}

			$this->model_update->update_slider($slider_id,$data);
		}

		redirect('admin/slider');
	}

	function update_category() {

            $category_id        = $this->input->post('category_id');
            $category_title     = $this->input->post('category_title');
            $category_image_old = $this->input->post('category_image_old');
            $category_image_new = $_FILES['category_image_new']['name'];

            /* $config = array(

                'upload_path' => "./assets/image/category",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'remove_spaces' => FALSE,
                'overwrite' => TRUE,
                'max_size' => "2048000",
                'max_height' => "2200",
                'max_width' => "2200"

            ); */

            if ($category_image_new == '') {

                $data = array(

                  'category_title' => $category_title,
                  'image' => $category_image_old,

                );

                $this->model_update->update_category($category_id,$data);
            }
            else {

            $data = array(

                'category_title' => $category_title,
                'image' => $category_image_new,


            );


            $new_path = "assets/image/product/category";
            if(!empty($category_image_new))
            {
                $arr3["new_path"] = $new_path;
                $arr3["element"]  = "category_image_new";
                $c = $this->upload2->upload_process($arr3);
            }

            $this->model_update->update_category($category_id,$data);
        }

        redirect('admin/product-category');
    }

    function update_category_po() {

            $category_id        = $this->input->post('category_po_id');
            $category_title     = $this->input->post('category_po_title');
            $category_image_old = $this->input->post('category_po_image_old');
            $expired = $this->input->post('expired');
            $display_date = $this->input->post('display_date');
            $category_image_new = $_FILES['category_image_new']['name'];

            if ($category_image_new == '') {

                $data = array(

                  'category_po_title' => $category_title,
                  'category_po_image' => $category_image_old,
                  'expired' => $expired,
                   'display_date' => $display_date,


                );

                $this->model_update->update_category_po($category_id,$data);
            }
            else {

            $data = array(

                'category_po_title' => $category_title,
                'category_po_image' => $category_image_new,
                'expired' => $expired,



            );



            $new_path = "assets/image/product/category_po";
            if(!empty($category_image_new))
            {
                $arr3["new_path"] = $new_path;
                $arr3["element"]  = "category_image_new";
                $c = $this->upload2->upload_process($arr3);
            }

            $this->model_update->update_category_po($category_id,$data);
        }

        redirect('admin/category_po');
    }

	function update_manufacturer() {
		
		$manu_id = $this->input->post('manu_id');
		$manu_title = $this->input->post('manu_title');
		// $manu_link = $this->input->post('manu_link');
		$manu_desc = $this->input->post('manu_desc');
		$manu_image_old = $this->input->post('manu_image_old');
		
		if(!empty($_FILES["manu_image_new"]["name"]))
		{
			$file_tmp = $_FILES["manu_image_new"]["tmp_name"];
			$file_path = pathinfo($_FILES['manu_image_new']['name']);
			$manu_image_new = $manu_title.".$file_path[extension]";;
		}
		/*$config = array(

			'upload_path' => "./assets/image/manufacturer",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'remove_spaces' => FALSE,
			'overwrite' => TRUE,
			'max_size' => "2048000",
			'max_height' => "2200",
			'max_width' => "2200"

		);*/

		if ($manu_image_new == '') {

			$data = array(

			  'manu_title' => $manu_title,
			  'manu_image' => $manu_image_old,
			 // 'manu_link' => $manu_link,
			  'manu_desc' => $manu_desc

			);

			$this->model_update->update_manufacturer($manu_id,$data);
		}
		else {

			$data = array(

			  'manu_title' => $manu_title,
			  'manu_image' => $manu_image_new,
			 // 'manu_link' => $manu_link,
			  'manu_desc' => $manu_desc

			);

			/* $this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('manu_image_new');*/

			$new_path = "assets/image/brand/$manu_image_new";
			if(!empty($_FILES["manu_image_new"]["name"]))
			{

				$c = $upload = move_uploaded_file($file_tmp,$new_path);
				//var_dump($c); exit;	
			}


			$this->model_update->update_manufacturer($manu_id,$data);
		}




		redirect('admin/brand');
	}


	function update_promo_text()
	{

		$promo_text = $this->input->post('promo_text');

		$data = array(

			'promo_text' => $promo_text,

		);

		$this->model_update->update_promo_text($data);

		redirect('admin/promo/1');
	}

	function update_contact()
	{

		$no_contact = $this->input->post('no_contact');
		$contact_id = $this->input->post('contact_id');

		$data = array(

			'no_contact' => $no_contact,
			'contact_id' => $contact_id,

		);

		$this->model_update->update_contact($contact_id,$data);

		redirect('admin/contact');
	}


	function update_po_info()
	{

		$promo_text = $this->input->post('po_info');

		$data = array(

			'information_desc' => $promo_text,

		);

		$this->model_update->update_po_info($data);

		redirect('admin/po_info/1');

	}

	function return_info()
	{

		$promo_text = $this->input->post('return_info');

		$data = array(

			'return_desc' => $promo_text,

		);

		$this->model_update->return_info($data);

		redirect('admin/return/1');

	}

	function htb_info()
	{

		$promo_text = $this->input->post('htb_info');

		$data = array(

			'htb_desc' => $promo_text,

		);

		$this->model_update->htb_info($data);

		redirect('admin/htb/1');

	}

	function about_info()
	{

		$promo_text = $this->input->post('about_info');

		$data = array(

			'about_desc' => $promo_text,

		);

		$this->model_update->about_info($data);

		redirect('admin/about/1');

	}

	function update_event() {

		$event_id = $this->input->post('event_id');
		$event_title = $this->input->post('event_name');
		$event_desc = $this->input->post('event_desc');


		if ($_FILES['event_image']['name']== '') {

			$image_1 = $this->input->post('event_image_old');
		}
		else {
			$image_1 = $_FILES['event_image']['name'];
		}

		/*$config = array(

			'upload_path' => "./assets/image/events",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'remove_spaces' => FALSE,
			'overwrite' => TRUE,
			'max_size' => "2048000",
			'max_height' => "2200",
			'max_width' => "2200"

		);*/

		$data = array(

		'news_title' => $event_title,
		'news_image' => $image_1,
		'news_desc' => $event_desc

		);

		/*$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('event_image');*/

		$new_path = "assets/image/events";
		if(!empty($_FILES['event_image']['name']))
		{
			$arr["new_path"] = $new_path;
			$arr["element"] = "event_image";
			$this->upload2->upload_process($arr);
		}

		$this->model_update->update_event($event_id,$data);

		redirect('admin/event');
	}

	function update_news() {

		$news_id = $this->input->post('news_id');
		$news_title = $this->input->post('news_name');
		$news_desc = $this->input->post('news_desc');


		if ($_FILES['news_image']['name']== '') {

			$image_1 = $this->input->post('news_image_old');
		}
		else {
			$image_1 = $_FILES['news_image']['name'];
		}

		if ($_FILES['news_thumb']['name']== '') {

			$image_2 = $this->input->post('news_thumb_old');
		}
		else {
			$image_2 = $_FILES['news_thumb']['name'];
		}


		//print_r(array($image_1,$image_2) ); exit;

		/* $config = array(

			'upload_path' => "./assets/image/news",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'remove_spaces' => FALSE,
			'overwrite' => TRUE,
			'max_size' => "2048000",
			'max_height' => "2200",
			'max_width' => "2200"

		);*/

			$data = array(

			'news_title' => $news_title,
			'news_image' => $image_1,
			'news_desc' => $news_desc,
			'news_thumbnail' => $image_2

			);

			/* $this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('news_image');
			$this->upload->do_upload('news_thumb_image'); */

			if(!empty($_FILES['news_thumb']['name']))
			{
				$arr["new_path"] = "assets/image/news/";
				$arr["element"]  = "news_thumb";
				$d = $this->upload2->upload_process($arr);
			}

			if(!empty($_FILES['news_image']['name']))
			{
				$arr["new_path"] = "assets/image/news/";
				$arr["element"]  = "news_image";
				$d = $this->upload2->upload_process($arr);
			}

			$this->model_update->update_news($news_id,$data);




		redirect('admin/news');
	}

	function update_discount() {

		$discount_id 	= $this->input->post('discount_id');
		$discount_code  = $this->input->post('discount_code');
		$discount_price = $this->input->post('discount_price');
		$discount_name	= $this->input->post('discount_name');
		$discount_desc  = $this->input->post('discount_desc');
		$start_date 	= $this->input->post('start_date');
		$expired_date 	= $this->input->post('expired_date');


		$data = array(
			'discount_code' => $discount_code,
			'discount_price' => $discount_price,
			'discount_name' => $discount_name,
			'discount_desc' => $discount_desc,
			'start_date' => $start_date,
			'expired_date' => $expired_date
		);

		$this->model_update->update_discount($discount_id,$data);

		redirect('admin/discount');
	}

	function update_admin() {

		$admin_id = $this->input->post('admin_id');
		$username = $this->input->post('username');
		$surename = $this->input->post('surename');
		$role_name= $this->input->post('role_name');
		$email= $this->input->post('email');


		$data = array(
			'username' => $username,
			'surename' => $surename,
			'role_id' => $role_name,
			'email' => $email
		);

		$this->model_update->update_admin($admin_id,$data);

		redirect('admin/users_admin');
	}

	function update_member() {

		$admin_id = $this->input->post('admin_id');
		$username = $this->input->post('username');
		$surename = $this->input->post('surename');
		$role_name= $this->input->post('role_name');
		$email= $this->input->post('email');

	    $user_id = $this->input->post('user_id');
        $username = $this->input->post('contact_person');
        $notlp = $this->input->post('no_tlp');
        $shippingaddress = $this->input->post('shipping_address');
        $email = $this->input->post('email');

		$data = array(
			'shipping_address' => $shippingaddress,
			'contact_person' => $username,
			'no_tlp' => $notlp,
			'email' => $email
		);

		$this->model_update->update_member($user_id,$data);

		redirect('admin/members');
	}

	function update_product() {
		
		$this->load->library("form_validation");
		
		$product_id 			= $this->input->post('product_id',true);
		$product_title 			= $this->input->post('product_title',true);
		$product_brand 			= $this->input->post('manu',true);
		$product_category 		= $this->input->post('product_category',true);
		$category_po 		    = $this->input->post('category_po',true);
		$product_code 			= $this->input->post('product_code',true);
		$product_availability 	= $this->input->post('product_availability',true);
		// $featured_product 		= $this->input->post('featured',true);
		$pack_item 				= $this->input->post("pack_item",TRUE);
		$deposit   				= $this->input->post("deposit",TRUE);
		$eta	   				= $this->input->post("eta",TRUE);
		$size	   				= $this->input->post("size",TRUE);
		$stock	  			 	= $this->input->post("stock",TRUE); 
		$weight	   				= $this->input->post("weight",TRUE);  
		$minimum_order			= $this->input->post("minimum_order",TRUE);
		// $style_code 			= $this->input->post("style_code",TRUE);
		$price	   				= $this->input->post("price",TRUE);
		$old_price	   			= $this->input->post("old_price",TRUE);
		$product_description 	= $this->input->post('product_desc',true);
		$product_category_url 	= url_title($product_category);
		$product_slug 			= url_title($product_title);


		if ($_FILES['product_image_new_1']['name']== '') {

			$image_1 = $this->input->post('product_image_old_1');
		}
		else {
			$image_1 = $_FILES['product_image_new_1']['name'];
		}

		$data = array(
			'product_id' => $product_id,
			'product_title' => $product_title,
			'manu_id' => $product_brand,
			'product_category' => $product_category,

			'product_code' => $product_code,
			'product_availability' => $product_availability,
			// 'featured' => $featured_product,
			
			"pack_item"=>$pack_item,
			"deposit" => $deposit,
			
			"size"=>$size,
			"stock"					=> $stock,
			"weight"			    => $weight,
			"minimum_order"=>$minimum_order,
			
			// "style_code"=>$style_code,
			"price"=>$price,
			"old_price"=>$old_price,

			'product_descrption' => $product_description,

			'category_url' => $product_category_url,
			'category_po_url' => $category_po,
			'product_slug' => $product_slug,

			'product_image_1' => $image_1,
		);
		
		// jika pre order maka minimum order dan eta harus berubah 
		if($product_availability == 1)
		{
		
			$data2 = array(
				"minimum_order"=>$minimum_order,
				"ETA"=>$eta
			
			);
			
			//update ETA and minimum order
			$this->model_update->update_product($product_id,$data2);
		}


			//upload baru
			$img_msg = "";
			if(!empty($_FILES["product_image_new_1"]["name"]))
			{
				$arr1["new_path"] = "assets/image/product";
				$arr1["element"]  = "product_image_new_1";
				$a = $this->upload2->upload_process($arr1);
				$img_msg .= $a["msg"];
			}

			$result = $this->model_update->update_product($product_id,$data);

			if($result == TRUE /* && (!$a["err"] || !$b["err"] || !$c["err"] || !$d["err"]) */)
			{

				$value='<div class="alert alert-success">Update Product Success '.$img_msg.'</div>';
				$this->session->set_flashdata('message',$value);
				//redirect('admin/product-list');
				redirect('admin/product-list');
			}
			else
			{

				$value='<div class="alert alert-danger"> Update Product Failed '.$img_msg.'</div>';
				$this->session->set_flashdata('message',$value);
				redirect("admin/edit_product/$product_id/$product_category_url/$product_slug");

			}


		redirect('admin/product-list');
	}

	function update_sparepart() {

		$sparepart_id = $this->input->post('sparepart_id');
		$sparepart_name = $this->input->post('sparepart_name');
		$manu_id = $this->input->post('manu_id');
		$sparepart_category = $this->input->post('sparepart_category');
		// $sparepart_code = str_replace('/\s+/', '',$this->input->post("sparepart_code"));
		$catalog_code =  str_replace(' ', '',$this->input->post('catalog_code'));
		$sparepart_price = $this->input->post('sparepart_price');
		
		$stock = $this->input->post('stock');
		$berat = $this->input->post('berat');
		$dimensi = $this->input->post('dimensi');
		$sparepart_desc = $this->input->post('sparepart_desc');
		$sparepart_text_preview = $this->input->post('sparepart_text_preview');
		$sparepart_slug = url_title($sparepart_name);


		if ($_FILES['sparepart_image_new_1']['name'] == '') {

			$product_image_1 = $this->input->post('sparepart_image_old_1');
		}
		else {
			$product_image_1 = $_FILES['sparepart_image_new_1']['name'];
		}


		if ($_FILES['sparepart_image_new_2']['name'] == '') {

			$product_image_2 = $this->input->post('sparepart_image_old_2');
		}
		else {
			$product_image_2 = $_FILES['sparepart_image_new_2']['name'];
		}



		if ($_FILES['sparepart_image_new_3']['name'] == '') {

			$product_image_3 = $this->input->post('sparepart_image_old_3');
		}
		else {
			$product_image_3 = $_FILES['sparepart_image_new_3']['name'];
		}



		if ($_FILES['sparepart_image_new_4']['name'] == '') {

			$product_image_4 = $this->input->post('sparepart_image_old_4');
		}
		else {
			$product_image_4 = $_FILES['sparepart_image_new_4']['name'];
		}


		/* $config = array(

			'upload_path' => "./assets/sp/images/products",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'remove_spaces' => FALSE,
			'overwrite' => TRUE,
			'max_size' => "2048000",
			'max_height' => "2200",
			'max_width' => "2200"

		); */

		$data = array(
			'sparepart_name' => $sparepart_name,
			'manu_id' => $manu_id,
			'sparepart_category' => $sparepart_category,

			'sparepart_code' => $catalog_code,
			'sparepart_price' => $sparepart_price,

			'stock' => 	$stock,
			'berat' => 	$berat,
			'dimensi' => 	$dimensi,
			'sparepart_text_preview' => $sparepart_text_preview,
			'sparepart_desc' => $sparepart_desc,

			'sparepart_slug' => $sparepart_slug,

			'sparepart_image' => $product_image_1,
			'sparepart_image_2' => $product_image_2,
			'sparepart_image_3' => $product_image_3,
			'sparepart_image_4' => $product_image_4

		);


			/* $this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('sparepart_image_new_1');
			$this->upload->do_upload('sparepart_image_new_2');
			$this->upload->do_upload('sparepart_image_new_3');
			$this->upload->do_upload('sparepart_image_new_4');*/
			$img_msg = "";
			$new_path = "assets/sp/images/products/";
			if(!empty($_FILES["sparepart_image_new_1"]["name"]))
			{

				$arr1["new_path"] = $new_path;
				$arr1["element"]  = "sparepart_image_new_1";
				$a = $this->upload2->upload_process($arr1);
				$img_msg .= $a["msg"];

			}



			if(!empty($_FILES["sparepart_image_new_2"]["name"]))
			{

				$arr2["new_path"] = $new_path;
				$arr2["element"]  = "sparepart_image_new_2";
				$b = $this->upload2->upload_process($arr2);
				$img_msg .= $b["msg"];

			}



			if(!empty($_FILES["sparepart_image_new_3"]["name"]))
			{
				$arr3["new_path"] = $new_path;
				$arr3["element"]  = "sparepart_image_new_3";
				$c = $this->upload2->upload_process($arr3);
				$img_msg .= $c["msg"];
			}
			if(!empty($_FILES["sparepart_image_new_4"]["name"]))
			{
				$arr4["new_path"] = $new_path;
				$arr4["element"]  = "sparepart_image_new_4";
				$d = $this->upload2->upload_process($arr4);
				$img_msg .= $d["msg"];
			}

			//print_r($_FILES);

			//var_dump($a);
			
			$result = $this->model_update->update_sparepart($sparepart_id,$data);

			if($result == TRUE)
			{

				$value='<div class="alert alert-success"> Update Sparepart Success '.$img_msg.'</div>';
				$this->session->set_flashdata("message",$value);
				redirect('admin/list_sparepart');

			}

			else

			{

				$value='<div class="alert alert-danger"> Update Sparepart Failed '.$img_msg.' </div>';
				$this->session->set_flashdata('message',$value);
				redirect("admin/edit_sparepart/$sparepart_id/$sparepart_code");

			}
	}

}
