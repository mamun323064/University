<?php
  require_once('functions/function.php');
  get_header();
  get_sidebar();
  $id=$_GET['v'];
  $sele="SELECT * FROM cs_feture  WHERE future_id ='$id'";
  $Qe=mysqli_query($con,$sele);
  $info=mysqli_fetch_assoc($Qe);
?>
    <div class="col-md-12 main_content">
        <div class="card">
          <div class="card-header">
              <div class="row">
                  <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> View Feature Information</h4>
                  </div>
                  <div class="col-md-4 text-right">
                      <a class="btn btn-sm btn-dark card_top_btn" href="all-feature.php"><i class="fa fa-th"></i> All Feature</a>
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
                              <td><?= $info['feture_title']; ?></td>
                          </tr>
                          <tr>
                              <td>Subtitle</td>
                              <td>:</td>
                              <td><?= $info['feture_subtitle']; ?></td>
                          </tr>
                          <tr>
                              <td>Icon</td>
                              <td>:</td>
                              <td><?= $info['feture_icon']; ?></td>
                          </tr>
                          <tr>
                              <td>BG</td>
                              <td>:</td>
                              <td><?= $info['feture_bg']; ?></td>
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