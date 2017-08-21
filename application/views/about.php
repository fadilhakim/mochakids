<div id="container">
    <div class="container">
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">About Us</h1>
          <div class="row">
            <div class="col-sm-12">
                    <?php foreach ($about as $p) { ?>
                      <?php echo $p->about_desc ?>
                    <?php } ?>
            </div>
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
</div>