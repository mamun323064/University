<?php
  require_once('functions/function.php');
  get_header();
  get_sidebar();
  $id=$_GET['v'];
  $sele="SELECT * FROM cs_quote NATURAL JOIN quote_course  WHERE quote_id='$id'";
  $Qe=mysqli_query($con,$sele);
  $info=mysqli_fetch_assoc($Qe);
?>
    <div class="col-md-12 main_content">
        <div class="card">
          <div class="card-header">
              <div class="row">
                  <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> View Request Quote Information</h4>
                  </div>
                  <div class="col-md-4 text-right">
                      <a class="btn btn-sm btn-dark card_top_btn" href="all-request-quote.php"><i class="fa fa-th"></i> All Quote</a>
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
                              <td>First Name</td>
                              <td>:</td>
                              <td><?= $info['quote_firstname']; ?></td>
                          </tr>
                          <tr>
                              <td>Last Name</td>
                              <td>:</td>
                              <td><?= $info['quote_lastname']; ?></td>
                          </tr>
                          <tr>
                              <td>Phone</td>
                              <td>:</td>
                              <td><?= $info['quote_phone']; ?></td>
                          </tr>
                          <tr>
                              <td>Mess</td>
                              <td>:</td>
                              <td><?= $info['quote_mess']; ?></td>
                          </tr>
                          <tr>
                              <td>Course</td>
                              <td>:</td>
                              <td><?= $info['course_name']; ?></td>
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