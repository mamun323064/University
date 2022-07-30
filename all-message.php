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
                    <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> All Messages</h4>
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
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Time</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    $sel="SELECT * FROM cs_contact ORDER BY con_id DESC";
                    $Q=mysqli_query($con,$sel);
                    while($data=mysqli_fetch_assoc($Q)){
                  ?>
                    <tr>
                        <td><?php echo $data['con_name']; ?></td>
                        <td><?= $data['con_email']; ?></td>
                        <td><?= $data['con_sub']; ?></td>
                        <td><?= substr($data['con_mess'],0,10); ?>...</td>
                        <td><?= $data['con_time']; ?></td>

                        <td>
                            <a href="view-message.php?v=<?= $data['con_id'] ?>"><i class="fa fa-plus-square fa-lg"></i></a>
                            <?php if($_SESSION['role']==1){ ?>
                            <a href="delete-message.php?d=<?= $data['con_id']; ?>"><i class="fa fa-trash fa-lg"></i></a>
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