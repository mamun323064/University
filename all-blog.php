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
                    <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> All Blog Information</h4>
                </div>
                <div class="col-md-4 text-right">
                   <?php if($_SESSION['role']==1){ ?>
                    <a class="btn btn-sm btn-dark card_top_btn" href="add-blog.php"><i class="fa fa-th"></i> Add Blog</a>
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
                        <th scope="col">Details</th>
                        <th scope="col">Button</th>
                        <th scope="col">Image</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    $selblog="SELECT * FROM cs_blog ORDER BY blog_id DESC";
                    $Qb=mysqli_query($con,$selblog);
                    while($data=mysqli_fetch_assoc($Qb)){
                  ?>
                    <tr>
                        <td><?php echo substr($data['blog_title'],0,10); ?>...</td>
                        <td><?= substr($data['blog_details'],0,20); ?>...</td>
                        <td><?= $data['blog_btn']; ?></td>
                
                        <td>
                            <?php if($data['blog_img']!=''){?>
                            <img style="height:50px; max-width:80px" class="img-thumbnail" src="uploads/<?= $data['blog_img']; ?>" alt="" />
                            <?php }else{ ?>
                            <img style="height:50px; max-width:80px" class="img-thumbnail" src="images/avatar.jpg" alt="" />
                            <?php } ?>
                        </td>
                        <td>
                            <a href="view-blog.php?v=<?= $data['blog_id'] ?>"><i class="fa fa-plus-square fa-lg"></i></a>
                            <a href="edit-blog.php?e=<?= $data['blog_id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                            <?php if($_SESSION['role']==1){ ?>
                            <a href="delete-blog.php?d=<?= $data['blog_id']; ?>"><i class="fa fa-trash fa-lg"></i></a>
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