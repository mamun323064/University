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
                    <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> All Teacher Information</h4>
                </div>
                <div class="col-md-4 text-right">
                   <?php if($_SESSION['role']==1){ ?>
                    <a class="btn btn-sm btn-dark card_top_btn" href="add-teacher.php"><i class="fa fa-th"></i> Add Teacher</a>
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
                        <th scope="col">Designation</th>
                        <th scope="col">Details</th>
                        <th scope="col">Image</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    $sel="SELECT * FROM cs_teacher ORDER BY teacher_id DESC";
                    $Q=mysqli_query($con,$sel);
                    while($data=mysqli_fetch_assoc($Q)){
                  ?>
                    <tr>
                        <td><?php echo substr($data['teacher_name'],0,10); ?>...</td>
                        <td><?= substr($data['teacher_designation'],0,20); ?>...</td>
                        <td><?= $data['teacher_details']; ?></td>
                
                        <td>
                            <?php if($data['teacher_photo']!=''){?>
                            <img style="height:50px; max-width:80px" class="img-thumbnail" src="uploads/<?= $data['teacher_photo']; ?>" alt="" />
                            <?php }else{ ?>
                            <img style="height:50px; max-width:80px" class="img-thumbnail" src="images/avatar.jpg" alt="" />
                            <?php } ?>
                        </td>
                        <td>
                            <a href="view-teacher.php?v=<?= $data['teacher_id'] ?>"><i class="fa fa-plus-square fa-lg"></i></a>
                            <a href="edit-teacher.php?e=<?= $data['teacher_id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                            <?php if($_SESSION['role']==1){ ?>
                            <a href="delete-teacher.php?d=<?= $data['teacher_id']; ?>"><i class="fa fa-trash fa-lg"></i></a>
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