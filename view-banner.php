<?php
  require_once('functions/function.php');
  get_header();
  get_sidebar();
  $id=$_GET['v'];
  $sele="SELECT * FROM cs_banner  WHERE banner_id='$id'";
  $Qe=mysqli_query($con,$sele);
  $info=mysqli_fetch_assoc($Qe);
?>
    <div class="col-md-12 main_content">
        <div class="card">
          <div class="card-header">
              <div class="row">
                  <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> View Banner Information</h4>
                  </div>
                  <div class="col-md-4 text-right">
                      <a class="btn btn-sm btn-dark card_top_btn" href="all-banner.php"><i class="fa fa-th"></i> All Banner</a>
                  </div>
                  <div class="clearfix"></div>
              </div>
          </div>
          <div class="card-body">
              <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                      <table class="table table-bordered table-striped table-hover custom_view_table">
                          <tr>
                              <td>Title</td>
                              <td>:</td>
                              <td><?= $info['ban_title']; ?></td>
                          </tr>
                          <tr>
                              <td>Subtitle</td>
                              <td>:</td>
                              <td><?= $info['ban_subtitle']; ?></td>
                          </tr>
                          <tr>
                              <td>Button</td>
                              <td>:</td>
                              <td><?= $info['ban_button']; ?></td>
                          </tr>
                          <tr>
                              <td>Url</td>
                              <td>:</td>
                              <td><?= $info['ban_url']; ?></td>
                          </tr>
                           <tr>
                              <td>Image</td>
                              <td>:</td>
                              <td>
                                   <?php if($info['ban_img']!=''){?>
                                <img style="height:50px; max-width:80px;" class="img-thumbnail" src="uploads/<?php echo $info['ban_img']; ?>" alt="">
                                <?php }else{ ?>
                                <img style="height:50px; max-width:80px;" class="img-thumbnail" src="images/avatar.jpg" alt="">
                             <?php } ?>
                                  
                              </td>
                          </tr> 
                      </table>
                  </div>
                  <div class="col-md-2"></div>
              </div>
          </div>
          <div class="card-footer text-center">
          </div>
        </div>
    </div>
<?php
    get_footer();
?>