<?php
  require_once('functions/function.php');
  needLogged();
  if($_SESSION['role']==1 || $_SESSION['role']==2){
  get_header();
  get_sidebar();
?>
<div class="col-md-12 main_content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> Request A Quote</h4>
                </div>
                <div class="col-md-4 text-right">
                   <?php if($_SESSION['role']==1){ ?>
                    <a class="btn btn-sm btn-dark card_top_btn" href="#"><i class="fa fa-th"></i> Link</a>
                    <?php } ?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover custom_table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Course</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Message</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    $sel="SELECT * FROM cs_quote NATURAL JOIN quote_course ORDER BY quote_id DESC";
                    $Q=mysqli_query($con,$sel);
                    while($data=mysqli_fetch_assoc($Q)){
                  ?>
                    <tr>
                        <td><?php echo $data['quote_firstname']; ?></td>
                        <td><?= $data['quote_lastname']; ?></td>
                        <td><?= $data['course_name']; ?></td>
                        <td><?= $data['quote_phone']; ?></td>
                        <td><?= substr($data['quote_mess'],0,10); ?>...</td>

                        <td>
                            <a href="view-quote.php?v=<?= $data['quote_id'] ?>"><i class="fa fa-plus-square fa-lg"></i></a>
                            <?php if($_SESSION['role']==1){ ?>
                            <a href="delete-quote.php?d=<?= $data['quote_id']; ?>"><i class="fa fa-trash fa-lg"></i></a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer text-center">
        </div>
    </div>
</div>
<?php
  get_footer();
  }else{
  header('Location:index.php');
  }
?>