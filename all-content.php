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
                    <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> All Content Information</h4>
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
                        <th scope="col">Title</th>
                        <th scope="col">Subtitle</th>
                        <th scope="col">Details</th>
                        <th scope="col">Image</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    $sel="SELECT * FROM cs_content NATURAL JOIN cs_page ORDER BY content_id ASC";
                    $Q=mysqli_query($con,$sel);
                    while($data=mysqli_fetch_assoc($Q)){
                  ?>
                    <tr>
                        <td><?php echo $data['page_name']; ?></td>
                        <td><?php echo $data['content_title']; ?></td>
                        <td><?= substr($data['content_subtitle'],0,20); ?>...</td>
                      
                    
                
                        <td>
                            <?php if($data['content_img']!=''){?>
                            <img style="height:50px; max-width:80px" class="img-thumbnail" src="uploads/<?= $data['content_img']; ?>" alt="" />
                            <?php }else{ ?>
                            <img style="height:50px; max-width:80px" class="img-thumbnail" src="images/avatar.jpg" alt="" />
                            <?php } ?>
                        </td>
                        <td>
                            
                            <a href="edit-content.php?e=<?= $data['content_id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                            <?php if($_SESSION['role']==1){ ?>
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