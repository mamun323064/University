<?php
 require_once('functions/function.php');
 needLogged();
 get_header();
 get_sidebar();

$id=$_GET['e'];
$sel="SELECT * FROM cs_courses WHERE courses_id='$id'";
$Q=mysqli_query($con,$sel);
$data=mysqli_fetch_assoc($Q);

if(!empty($_POST)){
  $eid=$_POST['eid'];
  $title=$_POST['title'];
  $subtitle=$_POST['subtitle'];
  $btn=$_POST['button'];


   
     $update="UPDATE cs_courses SET courses_title='$title', courses_details='$subtitle', courses_button='$btn' WHERE courses_id='$eid'";

    
    if(mysqli_query($con,$update)){
    
    header('Location:view-courses.php?v='.$id);
    }else{
     header('Location:edit-courses.php?e='.$id);
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
                            <h4 class="card_header_title"><i class="fa fa-gg-circle"></i>Update Courses Information</h4>
                        </div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-sm btn-dark card_top_btn" href="all-courses.php"><i class="fa fa-th"></i> All Courses</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Title:</label>
                        <div class="col-sm-7">
                           <input type="hidden" name="eid" value="<?= $data['courses_id']; ?>"/>
                            <input type="text" class="form-control" id="" name="title" value="<?= $data['courses_title']; ?>">
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Subtitle:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="" name="subtitle" value="<?= $data['courses_details']; ?>" >
                        </div>
                    </div>
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Button:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="" name="button" value="<?= $data['courses_button']; ?>">
                        </div>
                    </div>
                  
                  
                    <div class="form-group row custom_form_group">
                        <label class="col-sm-3 col-form-label">Image:</label>
                        <div class="col-sm-4">
                            <input type="file" id="" name="">

                        </div>
                        <div class="col-md-2">
                            <?php if($data['courses_img']!=''){?>
                                <img style="height:50px; max-width:80px;" class="img-thumbnail" src="admin/uploads/<?php echo $data['courses_img']; ?>" alt="">
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