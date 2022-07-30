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
                    <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> All Feature Information</h4>
                </div>
                <div class="col-md-4 text-right">
                   <?php if($_SESSION['role']==1){ ?>
                    <a class="btn btn-sm btn-dark card_top_btn" href="add-feature.php"><i class="fa fa-th"></i> Add Feature</a>
                    <?php } ?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="card-body">
        
            <table class="table table-bordered table-striped table-hover custom_table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Subtitle</th>
                        <th scope="col">Icon</th>
                        <th scope="col">BG</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    $sel="SELECT * FROM cs_feture ORDER BY future_id DESC";
                    $Q=mysqli_query($con,$sel);
                    while($data=mysqli_fetch_assoc($Q)){
                  ?>
                    <tr>
                        <td><?php echo substr($data['feture_title'],0,10); ?>...</td>
                        <td><?= substr($data['feture_subtitle'],0,20); ?>...</td>
                        <td><?= $data['feture_icon']; ?></td>
                        <td><?= $data['feture_bg']; ?></td>
             
                        <td>
                            <a href="view-feature.php?v=<?= $data['future_id'] ?>"><i class="fa fa-plus-square fa-lg"></i></a>
                            <a href="edit-feature.php?e=<?= $data['future_id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                            <?php if($_SESSION['role']==1){ ?>
                            <a href="delete-feature.php?d=<?= $data['future_id']; ?>"><i class="fa fa-trash fa-lg"></i></a>
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