<?php
 require_once('functions/function.php');
 needLogged();
 get_header();
 get_sidebar();

$id=$_GET['e'];
$sel="SELECT * FROM cs_blog WHERE blog_id='$id'";
$Q=mysqli_query($con,$sel);
$data=mysqli_fetch_assoc($Q);

if(!empty($_POST)){
  $eid=$_POST['eid'];
  $title=$_POST['title'];
  $details=$_POST['details'];
  $btn=$_POST['button'];
 

   
     $update="UPDATE cs_blog SET blog_title='$title', blog_details='$details', blog_btn='$btn' WHERE blog_id='$eid'";

    
    if(mysqli_query($con,$update)){
    
    header('Location:view-blog.php?v='.$id);
    }else{
     header('Location:edit-blog.php?e='.$id);
    }
}
?>

<div class="row">
    <div class="col-md-12 main_content">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card_header_title"><i class="fa fa-gg-circle"></i>Update Banner Information</h4>
                        </div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-sm btn-dark card_top_btn" href="all-blog.php"><i class="fa fa-th"></i> All Banner</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Title:</label>
                        <div class="col-sm-7">
                           <input type="hidden" name="eid" value="<?= $data['banner_id']; ?>"/>
                            <input type="text" class="form-control" id="" name="title" value="<?= $data['blog_title']; ?>">
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Details:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="" name="details" value="<?= $data['blog_details']; ?>" >
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Button:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="" name="button" value="<?= $data['blog_btn']; ?>">
                        </div>
                    </div>
                   
                  
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Image:</label>
                        <div class="col-sm-4">
                            <input type="file" id="" name="">

                        </div>
                        <div class="col-md-2">
                            <?php if($data['blog_img']!=''){?>
                                <img style="height:50px; max-width:80px;" class="img-thumbnail" src="admin/uploads/<?php echo $data['blog_img']; ?>" alt="">
                                <?php }else{ ?>
                                <img style="height:50px; max-width:80px;" class="img-thumbnail" src="images/avatar.jpg" alt="">
                             <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-sm btn-dark submit_btn">UPDATE</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
 require_once('functions/function.php');
get_footer();
?>