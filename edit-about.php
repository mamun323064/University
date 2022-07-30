<?php
 require_once('functions/function.php');
 needLogged();
 get_header();
 get_sidebar();

$id=$_GET['e'];
$sel="SELECT * FROM cs_about WHERE about_id='$id'";
$Q=mysqli_query($con,$sel);
$data=mysqli_fetch_assoc($Q);

if(!empty($_POST)){
  $eid=$_POST['eid'];
  $name=$_POST['name'];
  $title=$_POST['title'];
  $details=$_POST['details'];
  $btn=$_POST['button'];
 

   
     $update="UPDATE cs_about SET about_name='$name', about_title='$title', about_details='$details' WHERE about_id='$eid'";

    
    if(mysqli_query($con,$update)){
    
    header('Location:view-about.php?v='.$id);
    }else{
     header('Location:edit-about.php?e='.$id);
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
                            <h4 class="card_header_title"><i class="fa fa-gg-circle"></i>Update About Information</h4>
                        </div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-sm btn-dark card_top_btn" href="all-blog.php"><i class="fa fa-th"></i> All About</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Name:</label>
                        <div class="col-sm-7">
                           <input type="hidden" name="eid" value="<?= $data['about_id']; ?>"/>
                            <input type="text" class="form-control" id="" name="name" value="<?= $data['about_name']; ?>">
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Title:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="" name="title" value="<?= $data['about_title']; ?>">
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Comments:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="" name="details" value="<?= $data['about_details']; ?>" >
                        </div>
                    </div>
                    
                   
                  
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Image:</label>
                        <div class="col-sm-4">
                            <input type="file" id="" name="">

                        </div>
                        <div class="col-md-2">
                            <?php if($data['about_img']!=''){?>
                                <img style="height:50px; max-width:80px;" class="img-thumbnail" src="admin/uploads/<?php echo $data['about_img']; ?>" alt="">
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