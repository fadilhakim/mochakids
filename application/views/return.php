<div id="container">
    <div class="container">
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title" style="font-weight: bold;">Return :</h1>
          <style type="text/css">.htb li {list-style: none; font-size: 15.5px; line-height: 25px;}</style>
          <div class="row">
            <div class="col-sm-12 htb">
                <?php foreach ($returns as $p) { ?>
                      <?php echo $p->return_desc ?>
                  <?php } ?>
            </div>
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
</div>