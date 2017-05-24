<ul class="list-group">
  <li class="list-group-item">
  		<img class="img img-thumbnail img-responsive" src="<?=base_url("admin-assets/images/users/user_default.png")?>" height="100" >
        
        <div align="center"><b><?=$this->session->userdata("contact_person")?></b></div>
  
  </li>
  <li class="list-group-item"><a href="<?=base_url("profile")?>"> Profile </a></li>
  <li class="list-group-item"><a href="<?=base_url("profile/order")?>"> Order </a></li>
  <li class="list-group-item">
  		<a href="<?=base_url("profile/address_book")?>"> Address Book </a> 
  </li>
  <li class="list-group-item"><a href="<?=base_url("profile/account_setting")?>"> Account Setting </a></li>
  <li class="list-group-item"><a href="<?=base_url("login/logout_member")?>"> Logout </a></li>
</ul>