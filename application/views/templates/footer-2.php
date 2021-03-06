<div class="container hubungi">
<hr>
      <div class="row">
          <div class="col-lg-6">
            <h3 class="code-f" style="text-align: right">Hubungi Kami</h3>
          </div>
          <div class="col-lg-6">
            <div class="phone">
              <a title="No. Phone :" data-toggle="popover" data-content="<?php foreach ($contact_admin_1 as $ca1) { ?> 
                  <?php echo $ca1->no_contact ?>
                <?php } ?> " data-placement="bottom" >
                <img width="80%" style="float:left" src="<?php echo base_url('assets/image/phone-icon-clip-art--royalty--7.png'); ?>" class="img-responsive">
              </a>
            </div>

            <div class="phone">
              <a title="Whatsapp :" data-toggle="popover"  data-content="<?php foreach ($contact_admin_1 as $ca1) { ?> 
                  <?php echo $ca1->no_contact ?>
                <?php } ?>" data-placement="bottom">
              <img width="80%" style="float:left" src="<?php echo base_url('assets/image/whatsapp-black-logo-icon--24.png'); ?>" class="img-responsive">
              </a>
            </div>

            <div class="phone">
              <a title="PIN BBM :" data-toggle="popover" data-content="<?php foreach ($bbm as $bm) { ?> 
                  <?php echo $bm->no_contact ?>
                <?php } ?>" data-placement="bottom">
                <img width="80%" style="float:left" src="<?php echo base_url('assets/image/bbm-icon-24.png'); ?>" class="img-responsive">
              </a>
            </div>
          </div>
          <script>
          $(document).ready(function(){
              $('[data-toggle="popover"]').popover();
          });
          </script>
      </div>
</div>
<footer id="footer">
    <div class="fpart-first" style="background:#222222; color:#fff;">
      <div class="container">
        <div class="row">
        <style type="text/css">
          #footer h5 {
            color: #fff;
          }
        </style>
          <div class="contact col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <h5>Contact Details</h5>
            <ul>
              <li class="address"><i class="fa fa-map-marker"></i>Jakarta
              <li class="mobile"><i class="fa fa-phone"></i> 
              <?php foreach ($contact_footer_1 as $cf1) { ?> 
                  <?php echo $cf1->no_contact ?>
                <?php } ?></li>
              <li class="email"><i class="fa fa-envelope"></i>Send email via our <a href="<?php echo base_url('contact'); ?>">Contact Us</a>
            </ul>
          </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>Information</h5>
            <ul>
              <li><a href="<?php echo base_url('about'); ?>">About Us</a></li>
              <li><a href="<?php echo base_url('howtobuy'); ?>">How to Buy</a></li>
              <li><a href="<?php echo base_url('return'); ?>">Return</a></li>
            </ul>
          </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>Customer Service</h5>
            <ul>
              <li><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
              <li><a href="<?php echo base_url('return'); ?>">Return</a></li>
            </ul>
          </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>Contact</h5>
            <ul>
              <li><a href="<?php echo base_url(''); ?>"> <?php foreach ($contact_admin_1 as $ca1) { ?> 
                  <?php echo $ca1->no_contact ?>
                <?php } ?></a>
              </li>
              <li><a href="<?php echo base_url(''); ?>"><?php foreach ($contact_admin_2 as $ca2) { ?> 
                  <?php echo $ca2->no_contact ?>
                <?php } ?> </a></li>
              <li><a href="<?php echo base_url(''); ?>"><?php foreach ($contact_admin_3 as $ca3) { ?> 
                  <?php echo $ca3->no_contact ?>
                <?php } ?></a></li>
            </ul>
          </div>
          <div class="column col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <h5>Saran dan Kritik</h5>
            <ul>
              <li><a><?php foreach ($contact_saran_1 as $cs1) { ?> 
                  <?php echo $cs1->no_contact ?>
                <?php } ?></a></li>
              <li><a><a><?php foreach ($contact_saran_2 as $cs2) { ?> 
                  <?php echo $cs2->no_contact ?>
                <?php } ?></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div style="background-color:#222222; color:#fff;" class="fpart-second">
      <div class="container">
        <div id="powered" class="clearfix">
          <div class="powered_text pull-left flip">
            <p>Mocha Kids © 2017 </a></p>
          </div>
          <div class="social pull-right flip"> 
          <!--   <a href="#" target="_blank"> 
              <img data-toggle="tooltip" src="<?php echo base_url('assets/image/socialicons/facebook.png') ?>" alt="Facebook" title="Facebook">
            </a> 
            <a href="#" target="_blank"> 
              <img data-toggle="tooltip" src="<?php echo base_url('assets/image/socialicons/twitter.png') ?>" alt="Twitter" title="Twitter"> 
            </a> 
            <a href="#" target="_blank"> 
              <img data-toggle="tooltip" src="<?php echo base_url('assets/image/socialicons/google_plus.png') ?>" alt="Google+" title="Google+"> 
            </a>
            <a href="#" target="_blank"> 
              <img data-toggle="tooltip" src="<?php echo base_url('assets/image/socialicons/pinterest.png') ?>" alt="Pinterest" title="Pinterest"> 
            </a> 
            <a href="#" target="_blank"> 
              <img data-toggle="tooltip" src="<?php echo base_url('assets/image/socialicons/rss.png') ?>" alt="RSS" title="RSS"> 
            </a>  -->
          </div>
        </div>
        <div class="bottom-row">
        </div>
      </div>
    </div>
    <div id="back-top"><a data-toggle="tooltip" title="Back to Top" href="javascript:void(0)" class="backtotop"><i class="fa fa-chevron-up"></i></a></div>
</footer>
  <!--Footer End-->
</div>
<!-- JS Part Start-->
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.1.1.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.easing-1.3.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.dcjqaccordion.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/owl.carousel.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/custom.js'); ?>"></script>

<script src="<?php echo base_url('assets/sp/js/plugins.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/sp/js/main.js') ?>" type="text/javascript"></script>
<!-- JS Part End-->
<!--Start of Tawk.to Script-->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/59ae418fc28eca75e461e26e/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<!--End of Tawk.to Script-->

</body>
</html>